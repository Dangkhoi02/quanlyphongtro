<main class="hb-admin-main">
    <div class="admin-form-page">
        <header class="form-page-title">
            <p class="hb-eyebrow">HB HOME / ADMIN / PHÒNG</p>
            <div class="room-admin-heading">
                <div>
                    <h1>QUẢN LÝ PHÒNG</h1>
                    <p class="admin-muted">Danh sách minh họa, chỉ vận hành trên localhost.</p>
                </div>
            </div>
        </header>

        <?php if ($message): ?>
            <p class="form-message"><?= e($message) ?></p>
        <?php endif; ?>
        <?php foreach ($errors as $error): ?>
            <p class="form-message"><?= e($error) ?></p>
        <?php endforeach; ?>

        <section class="room-admin-stats">
            <article class="room-stat-card">
                <p>PHÒNG TRONG PHẠM VI</p>
                <strong><?= count($rooms) ?></strong>
            </article>
            <article class="room-stat-card">
                <p>CÒN PHÒNG</p>
                <strong><?= count(array_filter($rooms, fn ($room) => $room['trang_thai'] === 'Trống')) ?></strong>
            </article>
            <article class="room-stat-card">
                <p>ĐANG THUÊ</p>
                <strong><?= count(array_filter($rooms, fn ($room) => $room['trang_thai'] === 'Đang thuê')) ?></strong>
            </article>
        </section>

        <section class="form-panel">
            <h2>TÌM KIẾM VÀ LỌC PHÒNG</h2>
            <form class="room-admin-filters" method="get">
                <input type="hidden" name="page" value="rooms">
                <div class="form-field">
                    <label for="search">Mã hoặc tên phòng</label>
                    <input
                        id="search"
                        name="search"
                        value="<?= htmlspecialchars($search, ENT_QUOTES, 'UTF-8') ?>"
                    >
                </div>
                <div class="form-field">
                    <label for="status">Trạng thái</label>
                    <select id="status" name="status">
                        <option value="">Tất cả trạng thái</option>
                        <?php foreach ($statuses as $option): ?>
                            <option value="<?= e($option) ?>" <?= $status === $option ? 'selected' : '' ?>><?= e($option) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="room-filter-actions">
                    <button class="form-submit" type="submit">LỌC</button>
                </div>
            </form>
        </section>

        <section class="form-panel">
            <h2>THÊM PHÒNG</h2>
            <p class="admin-muted">Form chỉ phục vụ khu Admin mô phỏng trên localhost.</p>
            <form class="room-admin-filters" method="post" action="<?= e(admin_url('rooms')) ?>">
                <div class="form-field"><label for="ma_nha">Nhà trọ</label><select id="ma_nha" name="ma_nha" required><option value="">Chọn nhà trọ</option><?php foreach ($houses as $house): ?><option value="<?= (int) $house['ma_nha'] ?>" <?= $form['ma_nha'] === (string) $house['ma_nha'] ? 'selected' : '' ?>><?= e($house['ten_nha']) ?></option><?php endforeach; ?></select></div>
                <div class="form-field"><label for="ma_loai">Loại phòng</label><select id="ma_loai" name="ma_loai" required><option value="">Chọn loại</option><?php foreach ($types as $roomType): ?><option value="<?= (int) $roomType['ma_loai'] ?>" <?= $form['ma_loai'] === (string) $roomType['ma_loai'] ? 'selected' : '' ?>><?= e($roomType['ten_loai']) ?></option><?php endforeach; ?></select></div>
                <div class="form-field"><label for="so_phong">Số phòng</label><input id="so_phong" name="so_phong" value="<?= e($form['so_phong']) ?>" maxlength="10" required></div>
                <div class="form-field"><label for="tang">Tầng</label><input id="tang" name="tang" type="number" min="1" value="<?= e($form['tang']) ?>" required></div>
                <div class="form-field"><label for="gia_thue">Giá thuê (VND)</label><input id="gia_thue" name="gia_thue" type="number" min="1" value="<?= e($form['gia_thue']) ?>" required></div>
                <div class="form-field"><label for="trang_thai">Trạng thái</label><select id="trang_thai" name="trang_thai"><?php foreach ($statuses as $option): ?><option value="<?= e($option) ?>" <?= $form['trang_thai'] === $option ? 'selected' : '' ?>><?= e($option) ?></option><?php endforeach; ?></select></div>
                <div class="room-filter-actions"><button class="form-submit" type="submit">THÊM PHÒNG</button></div>
            </form>
        </section>

        <section class="form-panel">
            <div class="room-list-header">
                <h2>DANH SÁCH PHÒNG</h2>
                <span class="form-stat"><?= count($rooms) ?> kết quả</span>
            </div>
            <div class="admin-table-wrap">
                <table class="admin-data-table room-admin-table">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Số phòng</th>
                            <th>Nhà trọ</th>
                            <th>Loại</th>
                            <th>Giá/tháng</th>
                            <th>Tình trạng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rooms as $room): ?>
                            <tr>
                                <td><?= (int) $room['ma_phong'] ?></td>
                                <td class="room-name-cell"><?= e($room['so_phong']) ?></td>
                                <td><?= e($room['ten_nha']) ?></td>
                                <td><?= e($room['ten_loai']) ?></td>
                                <td><?= number_format((float) $room['gia_thue'], 0, ',', '.') ?>đ</td>
                                <td><?= e($room['trang_thai']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php if (!$rooms): ?>
                <p class="room-admin-empty">Không có phòng phù hợp với bộ lọc.</p>
            <?php endif; ?>
        </section>
    </div>
</main>
