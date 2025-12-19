<style>
    /* Order Detail Scoped Styles */
    #order-detail-container {
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px;
        background: #fdfdfd;
    }
    #order-detail-container h2 {
        font-size: 28px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 25px;
        text-transform: uppercase;
    }
    #order-detail-container .product-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-bottom: 30px;
    }
    #order-detail-container .product-item {
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        display: grid;
        grid-template-columns: 120px 1fr auto;
        gap: 20px;
        align-items: center;
        transition: all 0.3s ease;
    }
    #order-detail-container .product-item:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    #order-detail-container .product-img {
        width: 120px;
        height: 120px;
        border-radius: 8px;
        overflow: hidden;
        background: #f5f5f5;
    }
    #order-detail-container .product-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    #order-detail-container .product-info {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    #order-detail-container .product-name {
        font-size: 18px;
        font-weight: 700;
        color: #2c3e50;
    }
    #order-detail-container .product-detail {
        font-size: 14px;
        color: #7f8c8d;
        display: flex;
        gap: 30px;
    }
    #order-detail-container .product-price {
        text-align: right;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    #order-detail-container .price-unit {
        font-size: 14px;
        color: #7f8c8d;
    }
    #order-detail-container .price-amount {
        font-size: 20px;
        font-weight: 800;
        color: #e74c3c;
    }
    #order-detail-container .order-summary {
        background: #fff;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        border-left: 4px solid #3498db;
    }
    #order-detail-container .summary-row {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid #eee;
    }
    #order-detail-container .summary-row:last-child {
        border-bottom: none;
        padding-top: 20px;
        padding-bottom: 0;
        font-weight: 700;
        font-size: 18px;
    }
    #order-detail-container .summary-label {
        color: #7f8c8d;
    }
    #order-detail-container .summary-value {
        color: #2c3e50;
        font-weight: 600;
    }
    #order-detail-container .summary-row:last-child .summary-value {
        color: #e74c3c;
        font-size: 24px;
    }
    
    @media (max-width: 768px) {
        #order-detail-container {
            padding: 15px;
        }
        #order-detail-container h2 {
            font-size: 22px;
        }
        #order-detail-container .product-item {
            grid-template-columns: 100px 1fr;
            gap: 15px;
        }
        #order-detail-container .product-img {
            width: 100px;
            height: 100px;
        }
        #order-detail-container .product-price {
            grid-column: 1 / -1;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding-top: 10px;
            border-top: 1px solid #eee;
        }
        #order-detail-container .product-detail {
            font-size: 13px;
            gap: 15px;
        }
    }
</style>

<div id="order-detail-container">
    <h2>Chi tiết đơn hàng</h2>
    
    <div class="product-list">
        <?php if (!empty($data_hoadon) && is_array($data_hoadon)):
            $idx = 1;
            $total = 0;
            foreach ($data_hoadon as $row):
                $img = htmlspecialchars($row['hinhanh'] ?? '');
                $name = htmlspecialchars($row['ten_sp'] ?? '');
                $price = (float)($row['gia'] ?? 0);
                $qty = (int)($row['soluong'] ?? 0);
                $line = $price * $qty;
                $total += $line;
        ?>
            <div class="product-item">
                <div class="product-img">
                    <img src="Public/img/<?php echo $img ?>" alt="<?php echo $name ?>">
                </div>
                
                <div class="product-info">
                    <div class="product-name"><?php echo $name ?></div>
                    <div class="product-detail">
                        <span>Đơn giá: <strong><?php echo number_format($price, 0, ',', '.') ?> VNĐ</strong></span>
                        <span>Số lượng: <strong><?php echo $qty ?></strong></span>
                    </div>
                </div>
                
                <div class="product-price">
                    <div class="price-unit">Thành tiền</div>
                    <div class="price-amount"><?php echo number_format($line, 0, ',', '.') ?> VNĐ</div>
                </div>
            </div>
        <?php endforeach; endif; ?>
    </div>
    
    <div class="order-summary">
        <div class="summary-row">
            <span class="summary-label">Tổng tiền hàng:</span>
            <span class="summary-value"><?php echo number_format($total ?? 0, 0, ',', '.') ?> VNĐ</span>
        </div>
        <div class="summary-row">
            <span class="summary-label">Phí vận chuyển:</span>
            <span class="summary-value">Miễn phí</span>
        </div>
        <div class="summary-row">
            <span class="summary-label">TỔNG CỘNG:</span>
            <span class="summary-value"><?php echo number_format($total ?? 0, 0, ',', '.') ?> VNĐ</span>
        </div>
    </div>
</div>