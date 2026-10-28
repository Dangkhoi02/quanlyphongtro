<main class="hb-admin-main">
    <div class="admin-form-page">
        <header class="form-page-title">
            <p class="hb-eyebrow">HB HOME / ADMIN</p>
            <h1>TỔNG QUAN</h1>
            <p class="admin-muted">Khu quản trị mô phỏng phục vụ bài tập, thao tác trên localhost.</p>
        </header>

        <section class="room-admin-stats">
            <?php foreach ($dashboardStats as $label => $value): ?>
                <article class="room-stat-card">
                    <p><?= $label ?></p>
                    <strong><?= $value ?></strong>
                </article>
            <?php endforeach; ?>
        </section>

        <section class="form-panel">
            <h2>ĐIỀU HƯỚNG NHANH</h2>
            <p><a class="form-link" href="index.php?page=rooms">Quản lý danh sách phòng</a></p>
            <p><a class="form-link" href="index.php?page=history">Xem lịch sử thao tác demo</a></p>
        </section>
    </div>
</main>