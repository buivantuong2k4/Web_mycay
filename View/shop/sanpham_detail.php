<style>
    /* Scoped Styles for Product Detail Page */
    #pro-detail-container {
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        color: #333;
        line-height: 1.6;
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fdfdfd;
    }
    #pro-detail-container * {
        box-sizing: border-box;
    }
    #pro-detail-container .pd-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        margin-bottom: 50px;
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }
    #pro-detail-container .pd-image-col {
        flex: 1 1 400px;
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }
    #pro-detail-container .pd-image-col img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: transform 0.3s ease;
    }
    #pro-detail-container .pd-image-col img:hover {
        transform: scale(1.02);
    }
    #pro-detail-container .pd-info-col {
        flex: 1 1 400px;
    }
    #pro-detail-container .pd-title {
        font-size: 32px;
        font-weight: 700;
        color: #2c3e50;
        margin: 0 0 15px 0;
        text-transform: capitalize;
    }
    #pro-detail-container .pd-price-box {
        display: flex;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }
    #pro-detail-container .pd-price {
        font-size: 36px;
        font-weight: 800;
        color: #e74c3c;
        margin-right: 15px;
    }
    #pro-detail-container .pd-status {
        font-size: 14px;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    #pro-detail-container .status-stock { background: #e8f8f5; color: #27ae60; }
    #pro-detail-container .status-out { background: #fdedec; color: #c0392b; }
    
    #pro-detail-container .pd-meta {
        margin-bottom: 30px;
        color: #666;
        font-size: 15px;
    }
    #pro-detail-container .pd-actions {
        display: flex;
        gap: 15px;
        align-items: center;
        flex-wrap: wrap;
    }
    #pro-detail-container .qty-wrapper {
        display: flex;
        align-items: center;
        border: 2px solid #eee;
        border-radius: 8px;
        overflow: hidden;
    }
    #pro-detail-container .qty-input {
        width: 60px;
        text-align: center;
        border: none;
        padding: 12px;
        font-size: 18px;
        font-weight: 600;
        color: #333;
        outline: none;
    }
    #pro-detail-container .btn-add-cart {
        flex: 1;
        background: #e74c3c;
        color: white;
        border: none;
        padding: 15px 30px;
        font-size: 16px;
        font-weight: 700;
        text-transform: uppercase;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
        min-width: 200px;
    }
    #pro-detail-container .btn-add-cart:hover {
        background: #c0392b;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(231, 76, 60, 0.4);
    }
    #pro-detail-container .btn-disabled {
        background: #bdc3c7;
        cursor: not-allowed;
        box-shadow: none;
    }

    /* Tabs */
    #pro-detail-container .pd-tabs {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        overflow: hidden;
    }
    #pro-detail-container .tab-header {
        display: flex;
        background: #f8f9fa;
        border-bottom: 1px solid #eee;
    }
    #pro-detail-container .tab-btn {
        padding: 20px 30px;
        border: none;
        background: transparent;
        font-size: 16px;
        font-weight: 600;
        color: #7f8c8d;
        cursor: pointer;
        transition: all 0.3s;
        border-bottom: 3px solid transparent;
    }
    #pro-detail-container .tab-btn:hover { color: #e74c3c; }
    #pro-detail-container .tab-btn.active {
        color: #e74c3c;
        border-bottom-color: #e74c3c;
        background: #fff;
    }
    #pro-detail-container .tab-body {
        padding: 40px;
        opacity: 0;
        visibility: hidden;
        height: 0;
        overflow: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease, height 0.3s ease;
    }
    #pro-detail-container .tab-body.active { 
        opacity: 1;
        visibility: visible;
        height: auto;
    }
    
    /* Comments */
    #pro-detail-container .comment-box {
        background: #f9f9f9;
        padding: 25px;
        border-radius: 10px;
        margin-bottom: 30px;
    }
    #pro-detail-container .comment-input {
        width: 100%;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 15px;
        font-family: inherit;
        resize: vertical;
        min-height: 100px;
    }
    #pro-detail-container .btn-submit {
        background: #34495e;
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
    }
    #pro-detail-container .comment-item {
        display: flex;
        gap: 20px;
        padding: 20px 0;
        border-bottom: 1px solid #f1f1f1;
    }
    #pro-detail-container .comment-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }
    
    @media (max-width: 768px) {
        #pro-detail-container .pd-grid { flex-direction: column; padding: 20px; }
        #pro-detail-container .pd-title { font-size: 24px; }
        #pro-detail-container .pd-price { font-size: 28px; }
        #pro-detail-container .tab-btn { padding: 15px; font-size: 14px; flex: 1; }
        #pro-detail-container .tab-body { padding: 20px; }
    }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
</style>

<div id="pro-detail-container">
    <form action="?quanly=giohang&action=add&idsp=<?php echo $idsp ?>" method="post">
    <?php
    if (isset($data_sanpham) && is_array($data_sanpham)) {
        for ($i=0; $i < count($data_sanpham); $i++) { 
    ?>
        <div class="pd-grid">
            <div class="pd-image-col">
                <img src="Public/img/<?php echo $data_sanpham[$i]["hinhanh"]?>" alt="<?php echo $data_sanpham[$i]["tensanpham"]?>">
            </div>
            
            <div class="pd-info-col">
                <h1 class="pd-title"><?php echo $data_sanpham[$i]["tensanpham"]?></h1>
                
                <div class="pd-price-box">
                    <span class="pd-price"><?php echo number_format($data_sanpham[$i]["gia"], 0, ',', '.') ?> VNĐ</span>
                    <?php if($data_sanpham[$i]["soluong"] > 0): ?>
                        <span class="pd-status status-stock">Còn hàng</span>
                    <?php else: ?>
                        <span class="pd-status status-out">Hết hàng</span>
                    <?php endif; ?>
                </div>

                <div class="pd-meta">
                    <p><strong>Mã sản phẩm:</strong> SP<?php echo $idsp; ?></p>
                    <p><strong>Danh mục:</strong> Cây cảnh</p>
                    <p><strong>Tình trạng:</strong> Mới 100%</p>
                </div>

                <div class="pd-actions">
                    <div class="qty-wrapper">
                        <input type="number" name="soluong" value="1" min="1" max="<?php echo $data_sanpham[$i]["soluong"]?>" class="qty-input">
                    </div>
                    
                    <?php if($data_sanpham[$i]["soluong"] > 0): ?>
                        <button type="submit" name="themgiohang" class="btn-add-cart">
                            Thêm vào giỏ hàng
                        </button>
                    <?php else: ?>
                        <button type="button" disabled class="btn-add-cart btn-disabled">
                            Tạm hết hàng
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="pd-tabs">
            <div class="tab-header">
                <button type="button" class="tab-btn active" onclick="switchTab(event, 'desc')">Mô tả sản phẩm</button>
                <button type="button" class="tab-btn" onclick="switchTab(event, 'reviews')">Đánh giá & Bình luận</button>
            </div>
            
            <div id="tab-desc" class="tab-body active">
                <div style="font-size: 16px; color: #555;">
                    <?php echo $data_sanpham[$i]["chitiet"]?>
                </div>
            </div>
            
            <div id="tab-reviews" class="tab-body">
                <input type="hidden" value="<?php echo $idsp ?>" id="idsp">
                
                <?php if(isset($_SESSION["email"])): ?>
                    <div class="comment-box">
                        <h4 style="margin-top: 0; margin-bottom: 15px;">Viết bình luận của bạn</h4>
                        <textarea name="text" class="comment-input" placeholder="Chia sẻ cảm nghĩ của bạn về sản phẩm..."></textarea>
                        <button type="submit" class="btn-submit">Gửi đánh giá</button>
                    </div>
                <?php else: ?>
                    <div style="background: #fff3cd; color: #856404; padding: 15px; border-radius: 6px; margin-bottom: 20px;">
                        Vui lòng <a href="?quanly=dangnhap" style="color: #856404; font-weight: bold;">đăng nhập</a> để bình luận.
                    </div>
                <?php endif; ?>

                <div class="comments-list">
                    <h3 style="font-size: 20px; margin-bottom: 20px; border-bottom: 2px solid #eee; padding-bottom: 10px; display: inline-block;">Bình luận gần đây</h3>
                    
                    <!-- Static Example Comment -->
                    <div class="comment-item">
                        <img src="Public/img/368289346-119943134530141-4090670493568627179-n.jpg" alt="User" class="comment-avatar">
                        <div>
                            <div style="margin-bottom: 5px;">
                                <span style="font-weight: bold; color: #2c3e50;">Nguyễn Quang Đại</span>
                                <span style="color: #999; font-size: 12px; margin-left: 10px;">Vừa xong</span>
                            </div>
                            <div style="color: #555;">Sản phẩm rất tốt, giao hàng nhanh!</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php 
        } 
    } 
    ?>
    </form>
</div>

<script>
function switchTab(evt, tabName) {
    // Hide all tab bodies
    var bodies = document.getElementsByClassName("tab-body");
    for (var i = 0; i < bodies.length; i++) {
        bodies[i].classList.remove("active");
    }
    
    // Remove active class from all buttons
    var btns = document.getElementsByClassName("tab-btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].classList.remove("active");
    }
    
    // Show current tab and activate button
    document.getElementById("tab-" + tabName).classList.add("active");
    evt.currentTarget.classList.add("active");
}
</script>

