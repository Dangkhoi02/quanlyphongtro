<aside class="hb-admin-sidebar">
    <a class="hb-admin-logo" href="../index.php?page=home">HB Home</a>
    <p class="hb-sidebar-caption">QUẢN TRỊ MÔ PHỎNG</p>
    <nav class="hb-sidebar-menu" aria-label="Điều hướng quản trị">
        <a href="index.php?page=dashboard" <?= $page === 'dashboard' ? 'class="active" aria-current="page"' : '' ?>>
            TỔNG QUAN
        </a>
        <a href="index.php?page=rooms" <?= $page === 'rooms' ? 'class="active" aria-current="page"' : '' ?>>
            QUẢN LÝ PHÒNG
        </a>
        <a href="index.php?page=history" <?= $page === 'history' ? 'class="active" aria-current="page"' : '' ?>>
            LỊCH SỬ THAO TÁC
        </a>
        <a href="../index.php?page=home">XEM TRANG CHỦ</a>
    </nav>
    <p class="hb-sidebar-footer">
        CHỈ DÙNG TRÊN LOCALHOST<br>
        HB HOME · BT03
    </p>
</aside>