<?php
class ConnectionRouter {
    private mysqli $master;
    private array $replicas = []; // Danh sách các kết nối Slave
    private static $lastReplicaIndex = 0; // Để xoay vòng (Round Robin)
    private bool $forceReadYourWrites = true; 
    private int  $readYourWritesWindowSec = 3;
    private ?int $lastWriteAt = null;

    public function __construct(array $cfg) {
        // 1. Kết nối MASTER (Dùng để Ghi)
        $debugMsg = "[DEBUG] 🔗 Đang kết nối MASTER: " . $cfg['MASTER_HOST'] . " | PORT: " . $cfg['MASTER_PORT'] . " | DB: " . $cfg['DB'];
        error_log($debugMsg . "\n", 3, __DIR__."/debug.log");
        $this->master = @new mysqli(
            $cfg['MASTER_HOST'], $cfg['USER'], $cfg['PASS'], $cfg['DB'], (int)$cfg['MASTER_PORT']
        );
        if ($this->master->connect_error) die("Master connect failed: " . $this->master->connect_error);
        error_log("[DEBUG] ✅ MASTER kết nối thành công!\n", 3, __DIR__."/debug.log");
        $this->master->set_charset("utf8mb4");

        // 2. Kết nối CÁC REPLICA (Dùng để Đọc)
        error_log("[DEBUG] 🔗 Đang kết nối " . count($cfg['REPLICA_HOSTS']) . " REPLICA(S)...\n", 3, __DIR__."/debug.log");
        foreach ($cfg['REPLICA_HOSTS'] as $host) {
            $rep = @new mysqli($host, $cfg['USER'], $cfg['PASS'], $cfg['DB'], (int)$cfg['REPLICA_PORT']);
            if ($rep && !$rep->connect_error) {
                $rep->set_charset("utf8mb4");
                $this->replicas[] = $rep;
                error_log("[DEBUG] ✅ REPLICA kết nối OK: " . $host . "\n", 3, __DIR__."/debug.log");
            } else {
                error_log("[DEBUG] ❌ REPLICA FAILED: " . $host . "\n", 3, __DIR__."/debug.log");
            }
        }
    }

    // Thuật toán chọn Slave: Xoay vòng (Round Robin)
    private function getReplica(): ?mysqli {
        if (empty($this->replicas)) return null;
        
        // Lấy replica tiếp theo trong danh sách
        $index = self::$lastReplicaIndex % count($this->replicas);
        self::$lastReplicaIndex++;
        
        $conn = $this->replicas[$index];
        
        // Kiểm tra kết nối còn sống không, nếu chết thì thử cái khác hoặc trả về null
        if ($conn->ping()) {
            return $conn;
        }
        return null; 
    }

    public function query(string $sql) {
        $isRead = $this->isRead($sql);
        $time = date("H:i:s");

        // Chế độ "Đọc những gì vừa ghi": Nếu vừa ghi xong trong 3s thì bắt buộc đọc từ Master
        if ($isRead && $this->forceReadYourWrites && $this->lastWriteAt !== null
            && (time() - $this->lastWriteAt) <= $this->readYourWritesWindowSec) {
            error_log("[$time] [READ] 🟡 MASTER (Read-your-writes)\n", 3, __DIR__."/debug.log");
            error_log("[$time] [READ-LB] MASTER (Read-your-writes): $sql\n", 3, __DIR__."/query.log");
            return $this->master->query($sql);
        }

        if ($isRead) {
            $replica = $this->getReplica();
            if ($replica) {
                error_log("[$time] [READ] 🟢 REPLICA (Round-Robin)\n", 3, __DIR__."/debug.log");
                error_log("[$time] [READ-LB] SLAVE (Round-Robin): $sql\n", 3, __DIR__."/query.log");
                $res = $replica->query($sql);
                if ($res !== false) return $res;
            }
            // Nếu không có replica nào sống, fallback về Master
            error_log("[$time] [READ] 🟡 MASTER (Fallback)\n", 3, __DIR__."/debug.log");
            error_log("[$time] [READ-LB] MASTER (Fallback): $sql\n", 3, __DIR__."/query.log");
            return $this->master->query($sql);
        } else {
            // Lệnh GHI (INSERT, UPDATE, DELETE...) luôn vào Master
            error_log("[$time] [WRITE] 🔴 MASTER\n", 3, __DIR__."/debug.log");
            error_log("[$time] [WRITE] MASTER: $sql\n", 3, __DIR__."/query.log");
            $res = $this->master->query($sql);
            if ($res !== false) $this->lastWriteAt = time();
            return $res;
        }
    }

    // Các hàm bổ trợ giữ nguyên API của Mysqli
    public function real_escape_string(string $s): string { return $this->master->real_escape_string($s); }
    public function begin_transaction(): bool { return $this->master->begin_transaction(); }
    public function commit(): bool { $ok = $this->master->commit(); if ($ok) $this->lastWriteAt = time(); return $ok; }
    public function rollback(): bool { return $this->master->rollback(); }
    public function close(): void { 
        foreach ($this->replicas as $r) { @$r->close(); }
        @$this->master->close(); 
    }

    private function isRead(string $sql): bool {
        $s = ltrim($sql);
        return stripos($s,'SELECT')===0 || stripos($s,'SHOW')===0 || stripos($s,'DESCRIBE')===0 || stripos($s,'EXPLAIN')===0;
    }
}

class connection {
    public $mysqli;

    function __construct() {
        $this->mysqli = new ConnectionRouter([
            'MASTER_HOST' => 'ec2-54-89-173-176.compute-1.amazonaws.com', // IP Master của bạn
            'MASTER_PORT' => 3306,

            // DANH SÁCH 2 SLAVE
            'REPLICA_HOSTS' => [
                'ec2-54-235-59-63.compute-1.amazonaws.com', 
                'ec2-98-93-165-20.compute-1.amazonaws.com'
            ],
            'REPLICA_PORT' => 3306,

            'USER' => 'admin',
            'PASS' => 'Admin12345',
            'DB'   => 'my_cay',
        ]);
    }
}