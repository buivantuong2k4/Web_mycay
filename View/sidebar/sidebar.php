<div class="left">
	<div class="p-3">
		<h5 class="mb-2">Thực đơn</h5>
		<div class="list-group list-sidebar" role="navigation">
			<?php
				$current = isset($_GET['id_danhmuc']) ? (int)$_GET['id_danhmuc'] : 0;
				if (!empty($data_danhmuc) && is_array($data_danhmuc)) {
					foreach ($data_danhmuc as $dm) {
						$id = (int)($dm['id_danhmuc'] ?? 0);
						$name = htmlspecialchars($dm['ten_danh_muc'] ?? '');
						$active = $id === $current ? ' active' : '';
						echo "<a class=\"list-group-item list-group-item-action{$active}\" href=\"?quanly=shop&action=phanloai&id_danhmuc={$id}\">{$name}</a>";
					}
				}
			?>
		</div>
	</div>
</div>