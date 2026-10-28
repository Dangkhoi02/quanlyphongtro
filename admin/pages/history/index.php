<main class="hb-admin-main">
    <header class="ops-head">
        <p class="hb-eyebrow">HB HOME / ADMIN</p>
        <h1>DANH SÁCH HỢP ĐỒNG</h1>
        <p>Dữ liệu quản lý chỉ thao tác trên localhost.</p>
    </header>

    <section class="form-panel">
        <h2>HỢP ĐỒNG ĐÃ LẬP</h2>
        <p class="ops-count"><?= count($history) ?> hợp đồng</p>
        <div class="ops-table-wrap">
            <table class="ops-table">
                <thead>
                    <tr>
                        <th>Mã hợp đồng</th>
                        <th>Khách thuê</th>
                        <th>Phòng</th>
                        <th>Nhà trọ</th>
                        <th>Bắt đầu</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($history as $entry): ?>
                        <tr>
                            <td><?= (int) $entry['ma_hd'] ?></td>
                            <td><?= e($entry['ho_ten']) ?></td>
                            <td><?= e($entry['so_phong']) ?></td>
                            <td><?= e($entry['ten_nha']) ?></td>
                            <td><?= e($entry['ngay_bat_dau']) ?></td>
                            <td><?= e($entry['trang_thai']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
