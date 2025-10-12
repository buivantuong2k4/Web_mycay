<div class="left">
	<div class="p-3">
		<h5 class="mb-2">Danh mục bài viết</h5>
		<div class="list-group list-sidebar">
			<?php
				$currentId = isset($_GET['iddanhmuc']) ? (int)$_GET['iddanhmuc'] : 0;
				if (!empty($data_danhmucbv) && is_array($data_danhmucbv)) {
					foreach ($data_danhmucbv as $item) {
						$id = (int)($item['id_danhmucbv'] ?? 0);
						$name = htmlspecialchars($item['tendanhmucbv'] ?? '');
						$active = $id === $currentId ? ' active' : '';
						echo "<a class=\"list-group-item list-group-item-action{$active}\" href=\"index.php?quanly=danhmucbv&iddanhmuc={$id}\">{$name}</a>";
					}
				}
			?>
		</div>
	</div>
</div>