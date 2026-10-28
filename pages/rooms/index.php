<main class="rooms-page">
    <div class="container">
        <div class="pagehead">
            <h1>TẤT CẢ PHÒNG</h1>
            <p class="subtle">Tìm kiếm phòng phù hợp với nhu cầu và ngân sách.</p>
        </div>

        <div class="rooms-layout">
            <aside class="filters">
                <h2>BỘ LỌC</h2>
                <form method="get" action="index.php">
                    <input type="hidden" name="page" value="rooms">

                    <div class="field">
                        <label for="q">Từ khóa / tên đường</label>
                        <input
                            type="search"
                            id="q"
                            name="q"
                            value="<?= htmlspecialchars($query, ENT_QUOTES, 'UTF-8') ?>"
                            placeholder="Ví dụ: Nguyễn Thái Sơn"
                        >
                    </div>

                    <div class="field">
                        <label for="type">Loại phòng</label>
                        <select id="type" name="type">
                            <option value="">Tất cả</option>
                            <?php foreach ($types as $option): ?>
                                <option value="<?= e($option['ten_loai']) ?>" <?= $type === $option['ten_loai'] ? 'selected' : '' ?>>
                                    <?= e($option['ten_loai']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="field">
                        <label for="max">Giá tối đa</label>
                        <select id="max" name="max">
                            <option value="">Không giới hạn</option>
                            <?php foreach ([3000000 => '3 triệu', 4000000 => '4 triệu', 5000000 => '5 triệu'] as $value => $label): ?>
                                <option value="<?= $value ?>" <?= $max === $value ? 'selected' : '' ?>>
                                    <?= $label ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="field">
                        <label for="status">Tình trạng</label>
                        <select id="status" name="status">
                            <option value="">Tất cả</option>
                            <?php foreach ($validStatuses as $option): ?>
                                <option value="<?= e($option) ?>" <?= $status === $option ? 'selected' : '' ?>><?= e($option) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button class="btn filter-submit" type="submit">ÁP DỤNG BỘ LỌC</button>
                    <a class="filter-reset" href="index.php?page=rooms">XÓA BỘ LỌC</a>
                </form>
            </aside>

            <section class="rooms-results">
                <div class="listhead">
                    <p class="subtle"><?= count($rooms) ?> phòng phù hợp</p>
                </div>

                <div class="cards rooms-cards">
                    <?php foreach ($rooms as $room): ?>
                        <article class="card">
                            <div class="cardbody">
                                <h2>Phòng <?= e($room['so_phong']) ?> · <?= e($room['ten_nha']) ?></h2>
                                <p><?= e($room['dia_chi']) ?></p>
                                <p>
                                    <?= e($room['ten_loai']) ?> · <?= (int) $room['dien_tich'] ?>m² ·
                                    <strong><?= number_format((float) $room['gia_thue'], 0, ',', '.') ?>đ/tháng</strong>
                                </p>
                                <p><?= e($room['trang_thai']) ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

                <?php if (!$rooms): ?>
                    <p class="empty-message">Không tìm thấy phòng phù hợp. Hãy thử thay đổi bộ lọc.</p>
                <?php endif; ?>
            </section>
        </div>
    </div>
</main>
