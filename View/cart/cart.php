<div class="giohang" style="gap: 20px;">
  
  <div class="giohang_danhsach" style="flex: 1.5;">
    <?php if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0): ?>
    <div style="background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
      <table class="table1" style="width: 100%; border-collapse: collapse;"> 
        <thead style="background: #f8f9fa; border-bottom: 2px solid #e0e0e0;">
          <tr>
            <th style="padding: 12px; text-align: left; font-weight: 700; color: #333; width: 100px;">Ảnh</th>
            <th style="padding: 12px; text-align: left; font-weight: 700; color: #333;">Sản Phẩm</th>
            <th style="padding: 12px; text-align: right; font-weight: 700; color: #333; width: 100px;">Giá</th>
            <th style="padding: 12px; text-align: center; font-weight: 700; color: #333; width: 120px;">Số Lượng</th>
            <th style="padding: 12px; text-align: right; font-weight: 700; color: #333; width: 120px;">Thành Tiền</th>
            <th style="padding: 12px; text-align: center; font-weight: 700; color: #333; width: 50px;">Xóa</th>
          </tr>
        </thead>
        <tbody>
          <?php
          for ($i=0; $i < count($data_cart); $i++) { 
            $product = $data_cart[$i];
            $productId = (int)$product["id_sanpham"];
            $productName = htmlspecialchars($product["tensanpham"]);
            $productImage = htmlspecialchars($product["hinhanh"]);
            $price = (float)$product["gia"];
            $quantity = (int)$_SESSION['cart'][$productId];
            $total = $price * $quantity;
            $maxStock = (int)$product["soluong"];
          ?>
          <tr style="border-bottom: 1px solid #e0e0e0; transition: 0.2s;">
            <td style="padding: 12px; text-align: center;"><img src="Public/img/<?php echo $productImage; ?>" alt="<?php echo $productName; ?>" width="70px" height="70px" style="border-radius: 6px; object-fit: cover;"></td>
            <td style="padding: 12px; color: #333; font-weight: 500;"><?php echo $productName; ?></td>
            <td style="padding: 12px; text-align: right; color: #ec0e19; font-weight: 600;"><?php echo number_format($price, 0, ',', '.'); ?> VNĐ</td>
            <td style="padding: 12px; text-align: center;">
              <div class="soluong" style="background: #f0f0f0; border-radius: 6px; display: inline-flex; align-items: center; gap: 8px; padding: 6px 10px;">
                <?php if($maxStock > $quantity): ?>
                  <a href="?quanly=giohang&action=cong&idsp=<?php echo $productId; ?>" style="color: #ec0e19; cursor: pointer; font-weight: 700; font-size: 18px; text-decoration: none;">+</a>
                <?php else: ?>
                  <span style="color: #ccc; font-weight: 700; font-size: 18px;">+</span>
                <?php endif; ?>
                <span style="font-weight: 600; min-width: 20px; text-align: center;"><?php echo $quantity; ?></span>
                <a href="?quanly=giohang&action=tru&idsp=<?php echo $productId; ?>" style="color: #ec0e19; cursor: pointer; font-weight: 700; font-size: 18px; text-decoration: none;">−</a>
              </div>
            </td>
            <td style="padding: 12px; text-align: right; color: #ec0e19; font-weight: 700; font-size: 15px;"><?php echo number_format($total, 0, ',', '.'); ?> VNĐ</td>
            <td style="padding: 12px; text-align: center;"><a href="?quanly=giohang&action=xoa&idsp=<?php echo $productId; ?>" style="color: #999; font-size: 20px; text-decoration: none; cursor: pointer; transition: 0.2s; display: inline-block;" title="Xóa" onmouseover="this.style.color='#ec0e19';" onmouseout="this.style.color='#999';">✕</a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <div style="margin-top: 20px;">
      <a href="index.php" style="display: inline-block; padding: 10px 20px; background: #f0f0f0; color: #333; text-decoration: none; border-radius: 6px; font-weight: 600; transition: 0.2s;" onmouseover="this.style.background='#e0e0e0';" onmouseout="this.style.background='#f0f0f0';">← Tiếp tục mua hàng</a>
    </div>

    <?php else: ?>
    <div style="background: white; border-radius: 8px; padding: 40px; text-align: center; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
      <p style="font-size: 18px; color: #999; margin-bottom: 20px;">🛒 Giỏ hàng của bạn trống</p>
      <a href="index.php" style="display: inline-block; padding: 10px 20px; background: #ec0e19; color: white; text-decoration: none; border-radius: 6px; font-weight: 600; transition: 0.2s;" onmouseover="this.style.background='#cc0a14';" onmouseout="this.style.background='#ec0e19';">Tiếp tục mua hàng</a>
    </div>
    <?php endif; ?>
  </div>

  <!-- Summary Box -->
  <div style="flex: 1; position: sticky; top: 70px; height: fit-content;">
    <div style="background: white; border-radius: 8px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
      <h5 style="font-size: 16px; font-weight: 700; color: #333; margin-bottom: 15px; text-transform: uppercase; border-bottom: 2px solid #f0f0f0; padding-bottom: 10px;">💰 Tóm Tắt</h5>
      
      <div style="margin-bottom: 15px;">
        <div style="display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #f0f0f0;">
          <span style="color: #666;">Tạm tính:</span>
          <span style="font-weight: 700; color: #333;"><?php echo number_format($total, 0, ',', '.'); ?> VNĐ</span>
        </div>
      </div>

      <div style="margin-bottom: 20px; padding: 10px 0; border-bottom: 1px solid #f0f0f0;">
        <div style="display: flex; justify-content: space-between;">
          <span style="color: #666;">Phí vận chuyển:</span>
          <span style="font-weight: 700; color: #333;">Miễn phí</span>
        </div>
      </div>

      <div style="padding: 15px 0; border-bottom: 2px solid #f0f0f0; margin-bottom: 20px;">
        <div style="display: flex; justify-content: space-between;">
          <span style="font-weight: 700; font-size: 16px; color: #333;">Tổng cộng:</span>
          <span style="font-weight: 700; font-size: 18px; color: #ec0e19;"><?php echo number_format($total, 0, ',', '.'); ?> VNĐ</span>
        </div>
      </div>

      <?php
      if(isset($_SESSION['email']) && isset($_SESSION["cart"]) && count($_SESSION['cart'])>0):
      ?>
        <a href="index.php?quanly=order&action=dathang" style="display: block; width: 100%; padding: 12px; background: #ec0e19; color: white; text-decoration: none; border-radius: 6px; font-weight: 700; text-align: center; transition: 0.2s; cursor: pointer;" onmouseover="this.style.background='#cc0a14';" onmouseout="this.style.background='#ec0e19';">🛒 Đặt Hàng</a>
      <?php
      elseif(isset($_SESSION["cart"]) && count($_SESSION['cart'])>0):
      ?>
        <a href="?quanly=login&action=dangnhap" style="display: block; width: 100%; padding: 12px; background: #ec0e19; color: white; text-decoration: none; border-radius: 6px; font-weight: 700; text-align: center; transition: 0.2s; cursor: pointer;" onmouseover="this.style.background='#cc0a14';" onmouseout="this.style.background='#ec0e19';">🔓 Đăng Nhập để Thanh Toán</a>
      <?php
      endif;
      ?>
    </div>
  </div>

</div>