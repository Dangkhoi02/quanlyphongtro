<?php
declare(strict_types=1);

$search = trim((string) ($_GET['search'] ?? ''));
$status = (string) ($_GET['status'] ?? '');
$statuses = ['Trống', 'Đang thuê', 'Bảo trì'];
$errors = [];
$form = ['ma_nha' => '', 'ma_loai' => '', 'so_phong' => '', 'tang' => '', 'gia_thue' => '', 'trang_thai' => 'Trống'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form = [
        'ma_nha' => trim((string) ($_POST['ma_nha'] ?? '')),
        'ma_loai' => trim((string) ($_POST['ma_loai'] ?? '')),
        'so_phong' => trim((string) ($_POST['so_phong'] ?? '')),
        'tang' => trim((string) ($_POST['tang'] ?? '')),
        'gia_thue' => trim((string) ($_POST['gia_thue'] ?? '')),
        'trang_thai' => (string) ($_POST['trang_thai'] ?? 'Trống'),
    ];
    $houseId = filter_var($form['ma_nha'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    $typeId = filter_var($form['ma_loai'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    $floor = filter_var($form['tang'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    $price = filter_var($form['gia_thue'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    if (!$houseId || !$typeId || $form['so_phong'] === '' || !$floor || !$price || !in_array($form['trang_thai'], $statuses, true)) {
        $errors[] = 'Vui lòng nhập đầy đủ số phòng, tầng, giá thuê và các lựa chọn hợp lệ.';
    }
    if (!$errors) {
        try {
            createRoom($houseId, $typeId, $form['so_phong'], $floor, $price, $form['trang_thai']);
            header('Location: ' . admin_url('rooms', ['created' => 1]));
            exit;
        } catch (PDOException $exception) {
            $errors[] = 'Không thể thêm phòng. Số phòng có thể đã tồn tại trong nhà trọ đã chọn.';
        }
    }
}

$status = in_array($status, $statuses, true) ? $status : '';
$rooms = adminRooms($search, $status);
$houses = publicHomes();
$types = roomTypes();
$message = isset($_GET['created']) ? 'Đã thêm phòng thành công.' : '';
