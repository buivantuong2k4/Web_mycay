<div class="lichsu container py-3">
    <h1 class="mb-3">Lịch sử đơn hàng</h1>
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>Mã đơn</th>
                    <th>Ngày đặt</th>
                    <th class="text-end">Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data) && is_array($data)):
                    foreach ($data as $row):
                        $id = htmlspecialchars($row['id_hoadon'] ?? '');
                        $time = htmlspecialchars($row['timedathang'] ?? '');
                        $total = number_format((float)($row['tongtien'] ?? 0), 0, ',', '.');
                        $status = htmlspecialchars($row['trangthai'] ?? '');
                        // status badge color
                        $badgeClass = 'bg-secondary';
                        if (stripos($status, 'đang') !== false || stripos($status, 'processing') !== false) $badgeClass = 'bg-warning text-dark';
                        if (stripos($status, 'hoàn thành') !== false || stripos($status, 'completed') !== false) $badgeClass = 'bg-success';
                        if (stripos($status, 'hủy') !== false || stripos($status, 'cancel') !== false) $badgeClass = 'bg-danger';
                ?>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $time ?></td>
                        <td class="text-end"><?php echo $total ?> VNĐ</td>
                        <td><span class="badge <?php echo $badgeClass ?>"><?php echo $status ?></span></td>
                        <td><a class="btn btn-sm btn-outline-primary" href="?quanly=order&action=chitiet&id_hoadon=<?php echo urlencode($row['id_hoadon']) ?>">Xem chi tiết</a></td>
                    </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>