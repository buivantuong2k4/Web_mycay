<div class="donhang_detail container py-3">
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0">Chi tiết đơn hàng</h5>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table align-middle">
          <thead>
            <tr>
              <th>#</th>
              <th>Sản phẩm</th>
              <th>Tên</th>
              <th class="text-end">Đơn giá</th>
              <th class="text-center">Số lượng</th>
              <th class="text-end">Thành tiền</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($data_hoadon) && is_array($data_hoadon)):
              $idx = 1;
              foreach ($data_hoadon as $row):
                $img = htmlspecialchars($row['hinhanh'] ?? '');
                $name = htmlspecialchars($row['ten_sp'] ?? '');
                $price = (float)($row['gia'] ?? 0);
                $qty = (int)($row['soluong'] ?? 0);
                $line = $price * $qty;
            ?>
            <tr>
              <td><?php echo $idx++ ?></td>
              <td style="width:140px"><img src="Public/img/<?php echo $img ?>" alt="<?php echo $name ?>" class="img-fluid rounded" style="max-height:100px;object-fit:cover"></td>
              <td><?php echo $name ?></td>
              <td class="text-end"><?php echo number_format($price,0,',','.') ?> VNĐ</td>
              <td class="text-center"><?php echo $qty ?></td>
              <td class="text-end"><?php echo number_format($line,0,',','.') ?> VNĐ</td>
            </tr>
            <?php endforeach; endif; ?>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="5" class="text-end">Tổng cộng</th>
              <th class="text-end"><?php echo number_format((float)($total ?? 0),0,',','.') ?> VNĐ</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>