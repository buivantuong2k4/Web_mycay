
<div class="right">
	<h3>Bài viết mới nhất</h3>
	<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
		<?php if (!empty($data_baiviet_limit) && is_array($data_baiviet_limit)):
			foreach ($data_baiviet_limit as $item):
				$id = (int)($item['id_baiviet'] ?? 0);
				$title = htmlspecialchars($item['tenbaiviet'] ?? '');
				$intro = htmlspecialchars($item['gioithieu'] ?? '');
				$img = htmlspecialchars($item['hinhanh'] ?? '');
		?>
			<div class="col">
				<div class="card h-100">
					<a href="index.php?quanly=baiviet&action=baiviet_detail&idbv=<?php echo $id ?>">
						<img src="Public/img/<?php echo $img ?>" class="card-img-top" alt="<?php echo $title ?>" style="height:160px;object-fit:cover;border-bottom:1px solid #eee">
					</a>
					<div class="card-body">
						<h5 class="card-title"><a class="stretched-link text-dark" href="index.php?quanly=baiviet&action=baiviet_detail&idbv=<?php echo $id ?>"><?php echo $title ?></a></h5>
						<p class="card-text text-muted" style="font-size:14px"><?php echo $intro ?></p>
					</div>
				</div>
			</div>
		<?php endforeach; endif; ?>
	</div>

	<?php
		$row_count = count($data_baiviet ?? []);
		$perPage = 4;
		$trang = max(1, (int)ceil($row_count / $perPage));
	?>

	<nav aria-label="Page navigation" class="mt-4">
		<div class="d-flex justify-content-between align-items-center">
			<div class="small text-muted">Trang hiện tại: <?php echo (int)($page ?? 1) ?> / <?php echo $trang ?></div>
			<ul class="pagination ms-auto mb-0">
				<?php for ($i = 1; $i <= $trang; $i++): ?>
					<li class="page-item <?php echo ($i == ($page ?? 1)) ? 'active' : '' ?>"><a class="page-link" href="index.php?quanly=baiviet&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
				<?php endfor; ?>
			</ul>
		</div>
	</nav>
</div>