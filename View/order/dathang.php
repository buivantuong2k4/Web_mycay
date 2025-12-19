<?php
// Use the upgraded checkout partial when available. Falls back to original markup if not.
// if (file_exists(__DIR__ . '/dathang_new.php')) {
//     include __DIR__ . '/dathang_new.php';
//     return;
// }
// 
?>

<style>
    /* Checkout Page Scoped Styles */
    #checkout-container {
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        max-width: 1100px;
        margin: 0 auto;
        padding: 20px;
        background: #fdfdfd;
    }
    #checkout-container .checkout-wrapper {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }
    #checkout-container h3 {
        font-size: 22px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 20px;
        text-transform: uppercase;
        border-bottom: 2px solid #3498db;
        padding-bottom: 10px;
    }
    
    /* Order Summary */
    #checkout-container .order-summary {
        background: #fff;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }
    #checkout-container .order-items-wrapper {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 15px;
        margin-bottom: 20px;
    }
    #checkout-container .order-item {
        background: #f9f9f9;
        padding: 15px;
        border-radius: 8px;
        border-left: 3px solid #e74c3c;
        font-size: 14px;
    }
    #checkout-container .item-name {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 8px;
    }
    #checkout-container .item-qty {
        color: #7f8c8d;
        font-size: 13px;
        margin-bottom: 8px;
    }
    #checkout-container .item-price {
        color: #e74c3c;
        font-weight: 800;
        font-size: 16px;
    }
    #checkout-container .order-summary-box {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        padding-top: 20px;
        border-top: 2px solid #eee;
    }
    #checkout-container .order-subtotal,
    #checkout-container .order-total {
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 12px;
        background: #f9f9f9;
        border-radius: 6px;
    }
    #checkout-container .order-total {
        background: #e8f4f8;
        border-left: 3px solid #3498db;
    }
    #checkout-container .summary-label {
        font-size: 13px;
        color: #7f8c8d;
        text-transform: uppercase;
    }
    #checkout-container .summary-value {
        font-weight: 800;
        font-size: 18px;
        color: #2c3e50;
    }
    #checkout-container .order-total .summary-value {
        color: #e74c3c;
        font-size: 22px;
    }
    
    /* Checkout Form */
    #checkout-container .checkout-form {
        background: #fff;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        border-left: 4px solid #27ae60;
    }
    #checkout-container .form-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    #checkout-container .form-group {
        margin-bottom: 0;
    }
    #checkout-container .form-group.full-width {
        grid-column: 1 / -1;
    }
    #checkout-container .form-group label {
        display: block;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 8px;
        font-size: 14px;
    }
    #checkout-container .form-group input {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 15px;
        font-family: inherit;
        transition: all 0.3s;
    }
    #checkout-container .form-group input:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        outline: none;
    }
    #checkout-container .btn-checkout {
        width: 100%;
        padding: 16px;
        background: #27ae60;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 700;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
        box-shadow: 0 4px 12px rgba(39, 174, 96, 0.3);
        grid-column: 1 / -1;
    }
    #checkout-container .btn-checkout:hover {
        background: #229954;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(39, 174, 96, 0.4);
    }
    
    @media (max-width: 768px) {
        #checkout-container {
            padding: 15px;
        }
        #checkout-container .checkout-wrapper {
            gap: 20px;
        }
        #checkout-container h3 {
            font-size: 18px;
        }
        #checkout-container .order-items-wrapper {
            grid-template-columns: 1fr;
        }
        #checkout-container .order-summary-box {
            grid-template-columns: 1fr;
        }
        #checkout-container .form-wrapper {
            grid-template-columns: 1fr;
        }
        #checkout-container .btn-checkout {
            padding: 14px;
            font-size: 15px;
        }
    }
</style>

<div id="checkout-container">
    <div class="checkout-wrapper">
        <!-- Order Summary -->
        <div class="order-summary">
            <h3>Đơn hàng của bạn</h3>
            
            <div class="order-items-wrapper">
                <?php
                    for ($i=0; $i < count($data_cart); $i++) { 
                        $itemTotal = $data_cart[$i]["gia"] * $_SESSION['cart'][$data_cart[$i]["id_sanpham"]];
                ?>
                    <div class="order-item">
                        <div class="item-name"><?php echo htmlspecialchars($data_cart[$i]["tensanpham"]) ?></div>
                        <div class="item-qty">x<?php echo $_SESSION['cart'][$data_cart[$i]["id_sanpham"]] ?></div>
                        <div class="item-price"><?php echo number_format($itemTotal, 0, ',', '.') ?> VNĐ</div>
                    </div>
                <?php } ?>
            </div>
            
            <div class="order-summary-box">
                <div class="order-subtotal">
                    <span class="summary-label">Tạm tính</span>
                    <span class="summary-value"><?php echo number_format($total, 0, ',', '.') ?> VNĐ</span>
                </div>
                
                <div class="order-total">
                    <span class="summary-label">Tổng cộng</span>
                    <span class="summary-value"><?php echo number_format($total, 0, ',', '.') ?> VNĐ</span>
                </div>
            </div>
        </div>
        
        <!-- Checkout Form -->
        <div class="checkout-form">
            <h3>Thông tin hóa đơn</h3>
            
            <form action="?quanly=order&action=thanhtoan" method="post">
                <input type="hidden" name="total" value="<?php echo $total ?>">
                
                <div class="form-wrapper">
                    <?php
                        for ($i=0; $i < count($data_thongtin); $i++) { 
                    ?>
                        <div class="form-group">
                            <label for="ten">Tên</label>
                            <input type="text" id="ten" name="ten" value="<?php echo htmlspecialchars($data_thongtin[$i]["tennguoidung"] ?? '') ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($data_thongtin[$i]["email"] ?? '') ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="sdt">Số điện thoại</label>
                            <input type="tel" id="sdt" name="sdt" value="<?php echo htmlspecialchars($data_thongtin[$i]["sdt"] ?? '') ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="diachi">Địa chỉ</label>
                            <input type="text" id="diachi" name="diachi" value="<?php echo htmlspecialchars($data_thongtin[$i]["diachi"] ?? '') ?>" required>
                        </div>
                    
                    <?php } ?>
                    
                    <button type="submit" name="thanhtoan" class="btn-checkout">Thanh toán</button>
                </div>
            </form>
        </div>
    </div>
</div>