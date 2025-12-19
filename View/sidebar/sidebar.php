<div class="left" style="position: sticky; top: 70px; z-index: 10; padding-right: 20px;">
	<div class="p-4" style="background: white; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
		<h5 class="mb-3" style="font-size: 16px; font-weight: 700; color: #333; text-transform: uppercase; letter-spacing: 0.5px;">📋 Danh Mục</h5>
		<div class="list-group list-sidebar" role="navigation" style="border: none;">
			<?php
				$current = isset($_GET['id_danhmuc']) ? (int)$_GET['id_danhmuc'] : 0;
				if (!empty($data_danhmuc) && is_array($data_danhmuc)) {
					foreach ($data_danhmuc as $dm) {
						$id = (int)($dm['id_danhmuc'] ?? 0);
						$name = htmlspecialchars($dm['ten_danh_muc'] ?? '');
						$isActive = $id === $current;
						
						echo "<a class=\"list-group-item list-group-item-action\" href=\"?quanly=shop&action=phanloai&id_danhmuc={$id}\" style=\"
							background: " . ($isActive ? '#ec0e19' : '#f8f9fa') . ";
							color: " . ($isActive ? 'white' : '#333') . ";
							border: 1px solid " . ($isActive ? '#ec0e19' : '#e0e0e0') . ";
							border-radius: 6px;
							margin-bottom: 8px;
							padding: 10px 12px;
							font-weight: 600;
							font-size: 14px;
							transition: all 0.2s ease;
							text-decoration: none;
						\">
							{$name}
						</a>";
					}
				}
			?>
		</div>
	</div>
</div>