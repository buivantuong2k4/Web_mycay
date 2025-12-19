
<div class="right">
	<?php
	if(isset($data_loai)){
		$categoryName = htmlspecialchars($data_loai);
		echo '<h3 class="shop-title">🏷️ Danh Mục: ' . $categoryName . '</h3>';
	}
	elseif(isset($id_timkiem)){
		$searchTerm = htmlspecialchars($id_timkiem);
		echo '<h3 class="shop-title">🔍 Tìm Kiếm: ' . $searchTerm . '</h3>';
	}
	?>

	<div class="box">
		<?php
		if(!empty($data_sanpham_limit)){
			for($i=0;$i<count($data_sanpham_limit);$i++){
				$product = $data_sanpham_limit[$i];
				$productId = (int)$product['id_sanpham'];
				$productName = htmlspecialchars($product['tensanpham']);
				$productPrice = number_format($product['gia'],0,',','.');
				$productImage = htmlspecialchars($product['hinhanh']);
				$stock = (int)($product["soluong"] ?? 0);
		?>
		<div class="box-item shop-product-card">
			<a href="index.php?quanly=shop&action=chitiet&idsp=<?php echo $productId; ?>" class="product-link">
				<div class="product-image-wrapper">
					<img class="img img-responsive" src="Public/img/<?php echo $productImage; ?>" alt="<?php echo $productName; ?>">
					<?php if($stock <= 0): ?>
						<div class="product-out-of-stock">
							<span>Hết hàng</span>
						</div>
					<?php endif; ?>
				</div>
				<p class="title_product"><?php echo $productName; ?></p>
				<p class="price_product">💰 <?php echo $productPrice; ?> VNĐ</p>
			</a>
			<?php if($stock > 0): ?>
				<button class="add_cart" value="<?php echo $productId; ?>" title="Thêm vào giỏ">➕</button>
			<?php endif; ?>
		</div>
		<?php
			} 
		} else {
			echo '<div class="empty-state">😕 Không tìm thấy sản phẩm nào.</div>';
		}
		?>
	</div>
	
	<div style="clear:both;"></div>

	<?php
	$row_count = count($data_sanpham);
	$trang = ceil($row_count/12);
	?>

	<div class="pagination-section">
		<p class="pagination-info">📄 Trang <span class="current-page"><?php echo $page ?></span> / <?php echo $trang ?></p>
		
		<ul class="list_trang">
			<?php if($page > 1): ?>
				<li><a href="?trang=<?php echo $page - 1; ?>">← Trước</a></li>
			<?php endif; ?>

			<?php
			for($i=1;$i<=$trang;$i++){ 
				$isActive = ($i == $page);
			?>
				<li class="<?php echo $isActive ? 'active' : ''; ?>">
					<a href="?trang=<?php echo $i; ?>"><?php echo $i; ?></a>
				</li>
			<?php
			} 
			?>

			<?php if($page < $trang): ?>
				<li><a href="?trang=<?php echo $page + 1; ?>">Sau →</a></li>
			<?php endif; ?>
		</ul>
	</div>
	
</div>