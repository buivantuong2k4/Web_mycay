<style>
    /* Order History Scoped Styles */
    #order-history-container {
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px;
        background: #fdfdfd;
    }
    #order-history-container h1 {
        font-size: 32px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 30px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    #order-history-container .order-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    #order-history-container .order-card {
        background: #fff;
        border-radius: 10px;
        padding: 18px 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        transition: all 0.3s ease;
        border-left: 4px solid #e74c3c;
        display: grid;
        grid-template-columns: auto 1fr auto auto auto;
        gap: 20px;
        align-items: center;
    }
    #order-history-container .order-card:hover {
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transform: translateY(-2px);
    }
    #order-history-container .order-header {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }
    #order-history-container .order-id {
        font-size: 16px;
        font-weight: 700;
        color: #2c3e50;
    }
    #order-history-container .order-date {
        font-size: 13px;
        color: #7f8c8d;
    }
    #order-history-container .order-body {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }
    #order-history-container .order-info p {
        margin: 0;
        color: #555;
        font-size: 14px;
    }
    #order-history-container .order-total {
        font-size: 22px;
        font-weight: 800;
        color: #e74c3c;
        text-align: right;
    }
    #order-history-container .order-status {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        white-space: nowrap;
    }
    #order-history-container .status-processing {
        background: #fff3cd;
        color: #856404;
        border: 1px solid #ffeeba;
    }
    #order-history-container .status-completed {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    #order-history-container .status-cancelled {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    #order-history-container .status-pending {
        background: #e2e3e5;
        color: #383d41;
        border: 1px solid #d6d8db;
    }
    #order-history-container .btn-detail {
        background: #3498db;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        white-space: nowrap;
    }
    #order-history-container .btn-detail:hover {
        background: #2980b9;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(52, 152, 219, 0.3);
    }
    
    @media (max-width: 1024px) {
        #order-history-container .order-card {
            grid-template-columns: 1fr 1fr auto auto;
            gap: 15px;
        }
    }
    @media (max-width: 768px) {
        #order-history-container {
            padding: 15px;
        }
        #order-history-container h1 {
            font-size: 24px;
        }
        #order-history-container .order-card {
            grid-template-columns: 1fr auto;
            gap: 12px;
            padding: 15px;
        }
        #order-history-container .order-header {
            grid-column: 1;
        }
        #order-history-container .order-body {
            grid-column: 1;
        }
        #order-history-container .order-status {
            grid-column: 2;
            grid-row: 1;
        }
        #order-history-container .btn-detail {
            grid-column: 2;
        }
        #order-history-container .order-total {
            font-size: 18px;
        }
    }
</style>

<div id="order-history-container">
    <h1>Lịch sử đơn hàng</h1>
    
    <div class="order-list">
        <?php if (!empty($data) && is_array($data)): ?>
            <?php foreach ($data as $row):
                $id = htmlspecialchars($row['id_hoadon'] ?? '');
                $time = htmlspecialchars($row['timedathang'] ?? '');
                $total = number_format((float)($row['tongtien'] ?? 0), 0, ',', '.');
                $status = htmlspecialchars($row['trangthai'] ?? '');
                
                // Determine status class
                $statusClass = 'status-pending';
                if (stripos($status, 'đang') !== false || stripos($status, 'processing') !== false) {
                    $statusClass = 'status-processing';
                }
                if (stripos($status, 'hoàn thành') !== false || stripos($status, 'completed') !== false) {
                    $statusClass = 'status-completed';
                }
                if (stripos($status, 'hủy') !== false || stripos($status, 'cancel') !== false) {
                    $statusClass = 'status-cancelled';
                }
            ?>
                <div class="order-card">
                    <div class="order-header">
                        <div class="order-id">Đơn #<?php echo $id; ?></div>
                        <div class="order-date"><?php echo $time; ?></div>
                    </div>
                    
                    <div class="order-body">
                        <p><strong><?php echo $total; ?> VNĐ</strong></p>
                    </div>
                    
                    <span class="order-status <?php echo $statusClass; ?>"><?php echo $status; ?></span>
                    
                    <a href="?quanly=order&action=chitiet&id_hoadon=<?php echo urlencode($row['id_hoadon']); ?>" class="btn-detail">
                        Xem chi tiết
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="empty-state">
                <h3>Không có đơn hàng nào</h3>
                <p>Bạn chưa đặt hàng. Hãy tiếp tục mua sắm!</p>
            </div>
        <?php endif; ?>
    </div>
</div>