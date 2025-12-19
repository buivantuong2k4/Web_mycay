
<div class="home">
  <!-- Carousel Banner -->
  <div id="carouselExampleIndicators" class="carousel slide shadow" data-ride="carousel" style="margin-bottom: 40px; border-radius: 12px; overflow: hidden;">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="Public/img/z4582724565087-e4c12bf3425c1edf7dd5d05a44befcf4.jpg" alt="First slide" style="object-fit: cover; height: 400px;">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="Public/img/368289346-119943134530141-4090670493568627179-n.jpg" alt="Second slide" style="object-fit: cover; height: 400px;">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="Public/img/368338023-119040651287690-980268845250670363-n.jpg" alt="Third slide" style="object-fit: cover; height: 400px;">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- Categories Section -->
  <h3 style="margin-top: 40px; margin-bottom: 25px; font-size: 28px; color: #ec0e19; font-weight: 700; text-transform: uppercase; border-bottom: 3px solid #ec0e19; padding-bottom: 12px; display: inline-block;">📋 Danh Mục</h3>
  <div class="danhmuc" style="margin-bottom: 40px; display: flex; flex-wrap: wrap; gap: 12px;">
    <?php     
    if (!empty($data_danhmuc)) {
      foreach ($data_danhmuc as $category) {
        $id = htmlspecialchars($category["id_danhmuc"]);
        $name = htmlspecialchars($category["ten_danh_muc"]);
        echo '<a href="?quanly=shop&action=phanloai&id_danhmuc=' . $id . '" style="padding: 10px 20px; background-color: rgba(236, 14, 25, 0.1); color: #ec0e19; border-radius: 25px; text-decoration: none; font-weight: 600; transition: 0.3s; border: 2px solid #ec0e19; display: inline-block; cursor: pointer;">🔥 ' . $name . '</a>';
      }
    }
    ?>
  </div>

  <!-- Products Section -->
  <h3 style="margin-top: 40px; margin-bottom: 25px; font-size: 28px; color: #ec0e19; font-weight: 700; text-transform: uppercase; border-bottom: 3px solid #ec0e19; padding-bottom: 12px; display: inline-block;">🍲 Sản Phẩm Nổi Bật</h3>
  
  <div class="box">
    <?php if (!empty($data_sanpham_limit) && is_array($data_sanpham_limit)){
      for($i=0;$i<count($data_sanpham_limit);$i++){
        $sp = $data_sanpham_limit[$i];
        $productId = (int)$sp['id_sanpham'];
        $productName = htmlspecialchars($sp['tensanpham'] ?? '');
        $productPrice = number_format(floatval($sp['gia'] ?? 0),0,',','.');
        $productImage = htmlspecialchars($sp['hinhanh'] ?? '');
        $stock = (int)($sp['soluong'] ?? 0);
    ?>
    <div class="box-item" style="transition: 0.3s; border: none; background: white;">
      <a href="?quanly=shop&action=chitiet&idsp=<?php echo $productId; ?>" style="text-decoration: none;">
        <div class="box-img" style="position: relative; overflow: hidden; border-radius: 10px; background: #f5f5f5; aspect-ratio: 1/1; display: flex; align-items: center; justify-content: center;">
          <img class="img img-responsive" width="100%" src="Public/img/<?php echo $productImage; ?>" alt="<?php echo $productName; ?>" style="object-fit: cover; width: 100%; height: 100%; transition: 0.3s;">
          <?php if($stock <= 0): ?>
            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.6); display: flex; align-items: center; justify-content: center; border-radius: 10px;">
              <span style="color: white; font-weight: 700; font-size: 16px;">Hết hàng</span>
            </div>
          <?php endif; ?>
        </div>
        <p class="title_product" style="margin-top: 12px; font-size: 14px; color: #333; font-weight: 600; height: 40px; overflow: hidden;"><?php echo $productName; ?></p>
        <p class="price_product" style="color: #ec0e19; font-weight: 700; font-size: 16px;">💰 <?php echo $productPrice; ?> VNĐ</p>
      </a>
      <?php if($stock > 0): ?>
        <button class="add_cart" value="<?php echo $productId; ?>" style="cursor: pointer; transition: 0.3s;" title="Thêm vào giỏ">➕</button>
      <?php endif; ?>
    </div>
    <?php }
    } ?>
  </div>
  
  <div style="clear:both;"></div>

  <!-- Pagination Section -->
  <?php
  $row_count = count($data_sanpham);
  $trang = ceil($row_count/12);
  ?>

  <div style="margin-top: 40px; text-align: center; padding: 20px 0; border-top: 2px solid #f0f0f0;">
    <p style="margin: 10px 0; color: #666; font-weight: 500;">📄 Trang <span style="color: #ec0e19; font-weight: 700;"><?php echo $page ?></span> / <?php echo $trang ?></p>
    
    <ul class="list_trang" style="display: flex; justify-content: center; gap: 8px; flex-wrap: wrap; position: relative; margin: 20px 0 0 0; width: auto; left: auto;">
      <?php if($page > 1): ?>
        <li style="background: white; border: 2px solid #ec0e19; border-radius: 6px; padding: 0;"><a href="?trang=<?php echo $page - 1; ?>" style="display: block; padding: 8px 12px; color: #ec0e19; font-weight: 600;">← Trước</a></li>
      <?php endif; ?>

      <?php
      for($i=1;$i<=$trang;$i++){ 
        $isActive = ($i == $page);
      ?>
        <li style="background: <?php echo $isActive ? '#ec0e19' : 'white'; ?>; border: 2px solid #ec0e19; border-radius: 6px; padding: 0;">
          <a href="?trang=<?php echo $i; ?>" style="display: block; padding: 8px 12px; color: <?php echo $isActive ? 'white' : '#ec0e19'; ?>; font-weight: 600; text-decoration: none; min-width: 35px; text-align: center;"><?php echo $i; ?></a>
        </li>
      <?php
      } 
      ?>

      <?php if($page < $trang): ?>
        <li style="background: white; border: 2px solid #ec0e19; border-radius: 6px; padding: 0;"><a href="?trang=<?php echo $page + 1; ?>" style="display: block; padding: 8px 12px; color: #ec0e19; font-weight: 600;">Sau →</a></li>
      <?php endif; ?>
    </ul>
  </div>
  
</div>
