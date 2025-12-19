<?php
// class ConnectionRouter {
//     private mysqli $master;
//     private ?mysqli $replica;
//     private bool $forceReadYourWrites = true; // đọc từ master ngay sau khi ghi
//     private int  $readYourWritesWindowSec = 3;
//     private ?int $lastWriteAt = null;

//     public function __construct(array $cfg) {
//         // Kết nối MASTER (ghi)
//         $this->master = @new mysqli(
//             $cfg['MASTER_HOST'], $cfg['USER'], $cfg['PASS'], $cfg['DB'], (int)$cfg['MASTER_PORT']
//         );
//         if ($this->master->connect_error) die("Master connect failed: ".$this->master->connect_error);
//         $this->master->set_charset("utf8mb4");

//         // Kết nối REPLICA (đọc) – nếu lỗi sẽ fallback sang master
//         $rep = @new mysqli(
//             $cfg['REPLICA_HOST'], $cfg['USER'], $cfg['PASS'], $cfg['DB'], (int)$cfg['REPLICA_PORT']
//         );
//         if ($rep && !$rep->connect_error) {
//             $rep->set_charset("utf8mb4");
//             $this->replica = $rep;
//         } else {
//             $this->replica = null;
//         }
//     }

//     // GIỮ API CŨ: model vẫn gọi $this->mysqli->query($sql)
//     public function query(string $sql) {
//         $isRead = $this->isRead($sql);

//         // Đọc sau khi vừa ghi → đọc từ master trong X giây
//         if ($isRead && $this->forceReadYourWrites && $this->lastWriteAt !== null
//             && (time() - $this->lastWriteAt) <= $this->readYourWritesWindowSec) {
//             return $this->master->query($sql);
//         }

//         if ($isRead) {
//             if ($this->replica && @$this->replica->ping()) {
//                $time = date("H:i:s");
// error_log("[$time] [READ]  REPLICATION Query: $sql\n", 3, __DIR__."/query.log");

//                 $res = $this->replica->query($sql);
//                 if ($res !== false) return $res;
//             }
//             // fallback
//             return $this->master->query($sql);
//         } else {
//              $time = date("H:i:s");
// error_log("[$time] [READ] MASTER Query: $sql\n", 3, __DIR__."/query.log");

            
//             $res = $this->master->query($sql);
//             if ($res !== false) $this->lastWriteAt = time();
//             return $res;
//         }
//     }

//     public function real_escape_string(string $s): string { return $this->master->real_escape_string($s); }
//     public function begin_transaction(): bool { return $this->master->begin_transaction(); }
//     public function commit(): bool { $ok = $this->master->commit(); if ($ok) $this->lastWriteAt = time(); return $ok; }
//     public function rollback(): bool { return $this->master->rollback(); }
//     public function close(): void { if ($this->replica) @$this->replica->close(); @$this->master->close(); }
//     public function setReadYourWrites(bool $enabled, int $sec=3): void { $this->forceReadYourWrites=$enabled; $this->readYourWritesWindowSec=$sec; }

//     private function isRead(string $sql): bool {
//         $s = ltrim($sql);
//         return stripos($s,'SELECT')===0 || stripos($s,'SHOW')===0 || stripos($s,'DESCRIBE')===0 || stripos($s,'EXPLAIN')===0;
//     }
// }

// class connection {
//     public $mysqli; // giữ tên biến cũ để model không cần sửa

//     function __construct() {
//         // ====== ĐIỀN THÔNG TIN AWS RDS THẬT VÀO ĐÂY ======
//         $this->mysqli = new ConnectionRouter([
//             // MASTER (ghi)
//             'MASTER_HOST' => 'database-3.cti4wyq4efki.ap-southeast-2.rds.amazonaws.com',
//             'MASTER_PORT' => 3306,

//             // REPLICA (đọc)
//             'REPLICA_HOST' => 'replicadb3.cti4wyq4efki.ap-southeast-2.rds.amazonaws.com',
//             'REPLICA_PORT' => 3306,

//             // Thông tin DB
//             'USER' => 'admin',
//             'PASS' => '12345678',
//             'DB'   => 'WebMaster',
//         ]);

//         // Nếu bạn CHƯA có replica, dùng tạm 1 endpoint cho cả đọc/ghi:
//         // $this->mysqli = new ConnectionRouter([
//         //     'MASTER_HOST' => 'turntable.proxy.rlwy.net',
//         //     'MASTER_PORT' => 41758,
//         //     'REPLICA_HOST'=> 'turntable.proxy.rlwy.net',
//         //     'REPLICA_PORT'=> 41758,
//         //     'USER' => 'root',
//         //     'PASS' => 'XGdlDyprVMxujzJpzBwMCgZyUKLhXueW',
//         //     'DB'   => 'railway',
//         // ]);
//     // }
// } 
class connection {
    public $mysqli; // giữ tên biến cũ để model không cần sửa

    function __construct() {
        // ====== KẾT NỐI TẠM THỜI TỚI MYSQL ======
        $this->mysqli = new mysqli(
            'database-1.cixgksws6j2j.us-east-1.rds.amazonaws.com', // Hoặc địa chỉ IP của server MySQL
            'admin',      // Tên người dùng
            'Admin12345', // Mật khẩu của người dùng
            'my_cay', // Tên cơ sở dữ liệu
            3306 // Port MySQL mặc định
        );

        // Kiểm tra kết nối
        if ($this->mysqli->connect_error) {
            die("Kết nối đến MySQL thất bại: " . $this->mysqli->connect_error);
        }

        // Thiết lập bộ mã hóa ký tự
        $this->mysqli->set_charset("utf8mb4");
    }
}
