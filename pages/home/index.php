<main class="container" style="padding-top: 70px; padding-bottom: 70px">
    <p class="subtle">HB HOME / PUBLIC</p>
    <h1 style="font-size: 42px; max-width: 700px">
        <?= htmlspecialchars($headline, ENT_QUOTES, 'UTF-8') ?>
    </h1>
    <?php if (isset($notFound)): ?>
        <p>Đường dẫn bạn yêu cầu không nằm trong danh sách trang công khai.</p>
    <?php else: ?>
        <p>Khám phá danh sách phòng với bộ lọc theo khu vực, loại phòng và mức giá.</p>
        <section class="cards" aria-label="Nhà trọ nổi bật">
            <?php foreach ($homes as $home): ?>
                <article class="card">
                    <div class="cardbody">
                        <h2><?= e($home['ten_nha']) ?></h2>
                        <p><?= e($home['dia_chi']) ?></p>
                        <p><?= (int) $home['phong_trong'] ?> / <?= (int) $home['so_phong'] ?> phòng trống</p>
                        <a class="form-link" href="<?= e(url('rooms', ['q' => $home['ten_nha']])) ?>">Xem phòng tại đây</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>
    <p>
        <a class="btn" href="index.php?page=rooms">XEM PHÒNG</a>
    </p>
</main>
