<?php
// Improved checkout layout (preview). Place this file alongside the original and include it when ready.
?>
<div class="dathang" style="display:flex;gap:24px;flex-wrap:wrap;padding:18px;box-sizing:border-box;">

  <div class="donhang" style="flex:1 1 360px;min-width:300px;">
    <h3 style="color:#ec0e19;margin:0 0 10px">Đơn hàng của bạn</h3>

    <div style="background:#fff;padding:12px;border-radius:8px;border:1px solid rgba(0,0,0,0.06)">
      <ul style="list-style:none;padding:0;margin:0">
        <?php
        $subtotal = 0;
        if (!empty($data_cart) && is_array($data_cart)) {
          for ($i = 0; $i < count($data_cart); $i++) {
            $item = $data_cart[$i];
            $name = htmlspecialchars($item['tensanpham'] ?? 'Sản phẩm');
            $id = isset($item['id_sanpham']) ? (int)$item['id_sanpham'] : 0;
            $qty = isset($_SESSION['cart'][$id]) ? (int)$_SESSION['cart'][$id] : 0;
            $price = isset($item['gia']) ? floatval($item['gia']) : 0;
            $line = $price * $qty;
            $subtotal += $line;
        ?>
        <li style="display:flex;justify-content:space-between;padding:10px 6px;border-bottom:1px dashed rgba(0,0,0,0.04)">
          <div style="flex:1;color:#333;font-size:14px"><?php echo $name ?> <span style="color:#666;font-size:12px">x<?php echo $qty ?></span></div>
          <div style="min-width:110px;text-align:right;color:#ec0e19;font-weight:600"><?php echo number_format($line,0,',','.') ?> VNĐ</div>
        </li>
        <?php
          }
        }
        ?>
        <li style="display:flex;justify-content:space-between;padding:12px 6px;font-weight:600">
          <div>Tạm tính</div>
          <div style="text-align:right"><?php echo number_format($subtotal,0,',','.') ?> VNĐ</div>
        </li>
        <li style="display:flex;justify-content:space-between;padding:12px 6px;font-size:1.05em">
          <div>Tổng</div>
          <div style="color:#ec0e19;font-weight:700;text-align:right"><?php echo number_format($subtotal,0,',','.') ?> VNĐ</div>
        </li>
      </ul>
    </div>
  </div>

  <div class="thongtin" style="flex:1 1 320px;min-width:300px;">
    <h3 style="color:#ec0e19;margin:0 0 10px">Thông tin hóa đơn</h3>
    <form action="?quanly=order&action=thanhtoan" method="post">
      <input type="hidden" name="total" value="<?php echo htmlspecialchars($subtotal) ?>">

      <?php
      $info = ['tennguoidung'=>'','email'=>'','sdt'=>'','diachi'=>''];
      if (!empty($data_thongtin) && is_array($data_thongtin)) {
        $info = $data_thongtin[0];
      }
      ?>

      <div style="margin-bottom:8px">
        <label style="display:block;font-weight:600;margin-bottom:6px">Tên</label>
        <input required type="text" name="ten" value="<?php echo htmlspecialchars($info['tennguoidung'] ?? '') ?>" style="width:100%;padding:8px;border-radius:6px;border:1px solid #ddd">
      </div>

      <div style="margin-bottom:8px">
        <label style="display:block;font-weight:600;margin-bottom:6px">Email</label>
        <input required type="email" name="email" value="<?php echo htmlspecialchars($info['email'] ?? '') ?>" style="width:100%;padding:8px;border-radius:6px;border:1px solid #ddd">
      </div>

      <div style="margin-bottom:8px">
        <label style="display:block;font-weight:600;margin-bottom:6px">Số điện thoại</label>
        <input required type="text" name="sdt" value="<?php echo htmlspecialchars($info['sdt'] ?? '') ?>" style="width:100%;padding:8px;border-radius:6px;border:1px solid #ddd">
      </div>

      <div style="margin-bottom:12px">
        <label style="display:block;font-weight:600;margin-bottom:6px">Địa chỉ</label>
        <input type="text" name="diachi" value="<?php echo htmlspecialchars($info['diachi'] ?? '') ?>" style="width:100%;padding:8px;border-radius:6px;border:1px solid #ddd">
      </div>

      <div style="text-align:right">
        <button type="submit" name="thanhtoan" style="background:#28a745;color:#fff;border:0;padding:10px 18px;border-radius:8px;font-weight:600;cursor:pointer">Thanh toán</button>
      </div>
    </form>
  </div>

</div>