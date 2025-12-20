<style>
    /* Navigation Menu Scoped Styles */
    #navbar-container {
        background-color: #ec0e19;
        padding: 0;
        margin: 0;
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    #navbar-container .navbar {
        padding: 0;
        background: transparent;
    }
    #navbar-container .navbar-brand {
        font-weight: 700;
        font-size: 20px;
        color: white !important;
        margin-right: 30px;
        transition: all 0.3s;
    }
    #navbar-container .navbar-brand:hover {
        transform: scale(1.05);
    }
    #navbar-container .navbar-nav {
        gap: 0;
    }
    #navbar-container .nav-item {
        position: relative;
    }
    #navbar-container .nav-link {
        color: white !important;
        font-weight: 600;
        padding: 12px 18px;
        transition: all 0.3s;
        border-radius: 6px;
        margin: 0 5px;
    }
    #navbar-container .nav-link:hover {
        background: rgba(255,255,255,0.1);
        transform: translateY(-2px);
    }
    #navbar-container .nav_food {
        position: absolute;
        top: 100%;
        left: 0;
        background: white;
        min-width: 200px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        display: none;
        flex-direction: column;
        z-index: 1000;
        margin-top: 8px;
    }
    #navbar-container .food:hover .nav_food {
        display: flex;
    }
    #navbar-container .food_item {
        padding: 12px 18px;
        color: #333;
        text-decoration: none;
        transition: all 0.3s;
        font-weight: 500;
        border-bottom: 1px solid #f0f0f0;
    }
    #navbar-container .food_item:last-child {
        border-bottom: none;
    }
    #navbar-container .food_item:hover {
        background: #f5f5f5;
        color: #ec0e19;
        padding-left: 25px;
    }
    #navbar-container .search-form {
        display: flex;
        gap: 8px;
        align-items: center;
    }
    #navbar-container .search-input {
        width: 220px;
        border-radius: 20px;
        border: none;
        padding: 10px 18px;
        font-size: 14px;
        transition: all 0.3s;
    }
    #navbar-container .search-input:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(236, 14, 25, 0.2);
    }
    #navbar-container .btn-search {
        background-color: white;
        color: #ec0e19;
        border: none;
        border-radius: 20px;
        padding: 10px 18px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        font-size: 14px;
    }
    #navbar-container .btn-search:hover {
        background: #f0f0f0;
        transform: scale(1.05);
    }
    #navbar-container .user-profile {
        margin-left: 20px;
    }
    #navbar-container .profile-toggle {
        display: flex;
        align-items: center;
        gap: 12px;
        color: white;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s;
    }
    #navbar-container .profile-toggle:hover {
        opacity: 0.8;
    }
    #navbar-container .profile-image {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 2px solid white;
        object-fit: cover;
    }
    #navbar-container .dropdown-menu {
        border: none;
        border-radius: 10px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.12);
        padding: 0;
        overflow: hidden;
        min-width: 280px;
        animation: slideDown 0.3s ease;
    }
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    #navbar-container .dropdown-header {
        border-bottom: 2px solid #f0f0f0;
        background: linear-gradient(135deg, #f9f9f9 0%, #ffffff 100%);
        padding: 18px 20px !important;
    }
    #navbar-container .dropdown-header-name {
        font-weight: 700;
        color: #ec0e19;
        font-size: 16px;
        margin-bottom: 6px;
    }
    #navbar-container .dropdown-header-role {
        font-size: 11px;
        color: #999;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }
    #navbar-container .dropdown-item {
        padding: 14px 20px;
        color: #333;
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        font-weight: 500;
        font-size: 14px;
        position: relative;
        overflow: hidden;
    }
    #navbar-container .dropdown-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 3px;
        height: 100%;
        background: #ec0e19;
        transform: scaleY(0);
        transform-origin: bottom;
        transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    }
    #navbar-container .dropdown-item:hover {
        background: #f5f5f5;
        color: #ec0e19;
        padding-left: 28px;
    }
    #navbar-container .dropdown-item:hover::before {
        transform: scaleY(1);
        transform-origin: top;
    }
    #navbar-container .dropdown-item.logout {
        color: #ec0e19;
        font-weight: 600;
    }
    #navbar-container .dropdown-item.logout:hover {
        background: #ffe8e8;
        color: #c00;
    }
    #navbar-container .dropdown-divider {
        margin: 10px 0;
        border-color: #f0f0f0;
        border-top: 1px solid #f0f0f0;
    }
    #navbar-container .navbar-toggler {
        background-color: rgba(255,255,255,0.2);
        border: none;
    }
    #navbar-container .navbar-toggler:focus {
        box-shadow: none;
        background-color: rgba(255,255,255,0.3);
    }
    #navbar-container .navbar-toggler-icon {
        filter: brightness(0) invert(1);
    }
    
    @media (max-width: 992px) {
        #navbar-container .navbar-nav {
            gap: 0;
        }
        #navbar-container .nav-link {
            padding: 10px 15px;
            margin: 5px 0;
        }
        #navbar-container .nav_food {
            position: static;
            display: none;
            box-shadow: none;
            background: rgba(0,0,0,0.1);
            margin-top: 0;
        }
        #navbar-container .food:hover .nav_food {
            display: flex;
        }
        #navbar-container .food_item {
            color: white;
            border-bottom: none;
            padding: 10px 15px;
            padding-left: 30px;
        }
        #navbar-container .food_item:hover {
            background: rgba(255,255,255,0.1);
            color: white;
        }
        #navbar-container .search-form {
            margin-top: 15px;
            gap: 10px;
        }
        #navbar-container .search-input {
            width: 100%;
            flex: 1;
        }
        #navbar-container .user-profile {
            margin-left: 0;
            margin-top: 15px;
            border-top: 1px solid rgba(255,255,255,0.2);
            padding-top: 15px;
        }
    }
</style>

<nav class="navbar navbar-expand-lg" id="navbar-container">
    <div class="container-fluid" style="padding: 8px 20px;">
        <a class="navbar-brand" href="?quanly=home">🍽️ My Cay</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item food">
                    <a class="nav-link active" href="?quanly=shop">📋 Thực Đơn</a>
                    <div class="nav_food">
                        <?php
                        if (!empty($data_danhmuc)) {
                            foreach ($data_danhmuc as $category) {
                                $categoryId = htmlspecialchars($category["id_danhmuc"]);
                                $categoryName = htmlspecialchars($category["ten_danh_muc"]);
                                echo '<a href="?quanly=shop&action=phanloai&id_danhmuc=' . $categoryId . '" class="food_item">' . $categoryName . '</a>';
                            }
                        }
                        ?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?quanly=baiviet">🎁 Ưu Đãi</a>
                </li>
                <li class="nav-item nav_cart">
                    <a class="nav-link" href="?quanly=giohang">🛒 Giỏ Hàng</a>
                    <div class="modal-body"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?quanly=home&action=lienhe">✉️ Liên Hệ</a>
                </li>
            </ul>

            <form class="search-form d-flex" action="?quanly=shop&action=timkiem" method="post">
                <input class="search-input" type="search" name="tukhoa" placeholder="Tìm kiếm..." aria-label="Search" required>
                <button class="btn-search" name="timkiem" type="submit">🔍</button>
            </form>
            
            <div class="user-profile dropdown">
                <?php if (!empty($_SESSION['email'])): 
                    $profileImage = htmlspecialchars($data_nd['hinhanh'] ?? 'tải xuống (15).jpg');
                    $userName = htmlspecialchars($data_nd['tennguoidung'] ?? 'Người dùng');
                    $userRole = htmlspecialchars($_SESSION['phanquyen'] ?? '');
                ?>
                    <a class="profile-toggle dropdown-toggle" href="#" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="Public/img/<?php echo $profileImage; ?>" alt="<?php echo $userName; ?>" class="profile-image">
                        <span class="d-none d-lg-block"><?php echo $userName; ?></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li class="dropdown-header">
                            <div class="dropdown-header-name"><?php echo $userName; ?></div>
                            <div class="dropdown-header-role"><?php echo $userRole; ?></div>
                        </li>
                        <li><a class="dropdown-item" href="?quanly=login&action=profile"><span style="margin-right: 12px; font-size: 16px;">👤</span> Hồ Sơ</a></li>
                        <li><a class="dropdown-item" href="?quanly=order&action=lichsu"><span style="margin-right: 12px; font-size: 16px;">📦</span> Lịch Sử Đơn Hàng</a></li>
                        <?php if ($userRole === 'Admin'): ?>
                            
                            <li><a class="dropdown-item" href="Admin/index.php"><span style="margin-right: 12px; font-size: 16px;">⚙️</span> Quản Lý</a></li>
                        <?php endif; ?>
                        
                        <li><a class="dropdown-item logout" href="?quanly=taikhoan&action=dangxuat"><span style="margin-right: 12px; font-size: 16px;">🚪</span> Đăng Xuất</a></li>
                    </ul>
                <?php else: ?>
                    <a class="profile-toggle dropdown-toggle" href="#" id="guestDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="Public/img/tải xuống (15).jpg" alt="Guest" class="profile-image">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="guestDropdown">
                        <li><a class="dropdown-item" href="?quanly=login&action=dangki"><span style="margin-right: 12px; font-size: 16px;">✍️</span> Đăng Ký</a></li>
                        <li><a class="dropdown-item" href="?quanly=login&action=dangnhap"><span style="margin-right: 12px; font-size: 16px;">🔓</span> Đăng Nhập</a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
