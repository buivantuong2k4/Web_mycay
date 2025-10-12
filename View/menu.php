<nav class="navbar navbar-expand-lg bg-body-tertiary" >
  <div class="container-fluid" style=" background-color: #ec0e19">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="?quanly=home">Hidden brand</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item food">
          <a class="nav-link active" aria-current="page" href="?quanly=shop">thực đơn</a>
          <div class="nav_food">
            <?php
            for ($i=0; $i < count($data_danhmuc) ; $i++) { 
         
            echo '<a href="?quanly=shop&action=phanloai&id_danhmuc='.$data_danhmuc[$i]["id_danhmuc"].'" class="food_item">'.$data_danhmuc[$i]["ten_danh_muc"].'</a>';
            }?>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?quanly=baiviet">ưu đãi</a>
        </li>
        <li class="nav-item nav_cart" >
          <a class="nav-link " href="index.php?quanly=giohang">Giỏ hàng</a>
          <div class="modal-body">
                    
          </div>
          
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?quanly=home&action=lienhe">Liên hệ</a>
        </li>
        
          
      </ul>
    

     
      <form class="d-flex"   action="?quanly=shop&action=timkiem" method="post">
        <input class="form-control me-2" type="search" name="tukhoa" placeholder="Search" aria-label="Search" required>
        <button class="btn btn-outline-success"  name="timkiem"type="submit">Search</button>
      </form>
    </div>
    <div class="dropdown dropstart ms-3">
      <?php if (!empty($_SESSION['email'])): ?>
        <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="Public/img/<?php echo htmlspecialchars($data_nd['hinhanh'] ?? 'tải xuống (15).jpg'); ?>" alt="Profile" class="rounded-circle" width="36" height="36">
          <span class="d-none d-md-block ps-2"><?php echo htmlspecialchars($data_nd['tennguoidung'] ?? ''); ?></span>
        </a>

        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
          <li class="dropdown-header px-3">
            <strong><?php echo htmlspecialchars($data_nd['tennguoidung'] ?? ''); ?></strong>
            <div class="small text-muted"><?php echo htmlspecialchars($_SESSION['phanquyen'] ?? ''); ?></div>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="?quanly=login&action=profile">Hồ sơ</a></li>
          <li><a class="dropdown-item" href="?quanly=taikhoan&action=dangxuat">Đăng xuất</a></li>
          <li><a class="dropdown-item" href="?quanly=order&action=lichsu">Lịch sử đơn hàng</a></li>
          <?php if (isset($_SESSION['phanquyen']) && $_SESSION['phanquyen'] === 'Admin'): ?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="Admin/index.php">Trang quản lý</a></li>
          <?php endif; ?>
        </ul>
      <?php else: ?>
        <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" id="guestDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="Public/img/tải xuống (15).jpg" alt="Profile" class="rounded-circle" width="36" height="36">
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="guestDropdown">
          <li><a class="dropdown-item" href="?quanly=login&action=dangki">Đăng ký</a></li>
          <li><a class="dropdown-item" href="?quanly=login&action=dangnhap">Đăng nhập</a></li>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</nav>
