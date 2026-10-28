<?php
declare(strict_types=1);

require_once __DIR__ . '/Database.php';

/** Kết nối dùng chung trong một request. */
function db(): Database
{
    static $database = null;
    if ($database === null) {
        $database = new Database(require __DIR__ . '/config.php');
    }
    return $database;
}

function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function url(string $page, array $params = []): string
{
    return 'index.php?' . http_build_query(['page' => $page] + $params);
}

function admin_url(string $page, array $params = []): string
{
    return 'index.php?' . http_build_query(['page' => $page] + $params);
}

function publicHomes(): array
{
    return db()->fetchAll(
        'SELECT n.ma_nha, n.ten_nha, n.dia_chi, n.quan_huyen, COUNT(p.ma_phong) AS so_phong,
                SUM(p.trang_thai = ?) AS phong_trong
         FROM nha_tro n
         JOIN phong p ON p.ma_nha = n.ma_nha
         GROUP BY n.ma_nha, n.ten_nha, n.dia_chi, n.quan_huyen
         ORDER BY phong_trong DESC, n.ten_nha
         LIMIT 6',
        ['Trống']
    );
}

function publicRooms(string $keyword, string $type, int $maxPrice, string $status): array
{
    $sql = 'SELECT p.ma_phong, p.so_phong, p.tang, p.gia_thue, p.trang_thai,
                   n.ten_nha, n.dia_chi, n.quan_huyen, l.ten_loai, l.dien_tich
            FROM phong p
            JOIN nha_tro n ON n.ma_nha = p.ma_nha
            JOIN loai_phong l ON l.ma_loai = p.ma_loai
            WHERE 1 = 1';
    $params = [];

    if ($keyword !== '') {
        $sql .= ' AND (p.so_phong LIKE ? OR n.ten_nha LIKE ? OR n.dia_chi LIKE ?)';
        $like = '%' . $keyword . '%';
        array_push($params, $like, $like, $like);
    }
    if ($type !== '') {
        $sql .= ' AND l.ten_loai = ?';
        $params[] = $type;
    }
    if ($maxPrice > 0) {
        $sql .= ' AND p.gia_thue <= ?';
        $params[] = $maxPrice;
    }
    if ($status !== '') {
        $sql .= ' AND p.trang_thai = ?';
        $params[] = $status;
    }
    return db()->fetchAll($sql . ' ORDER BY p.ma_phong DESC LIMIT 24', $params);
}

function roomTypes(): array
{
    return db()->fetchAll('SELECT ma_loai, ten_loai FROM loai_phong ORDER BY ten_loai');
}

function adminRooms(string $keyword, string $status): array
{
    $sql = 'SELECT p.ma_phong, p.so_phong, p.tang, p.gia_thue, p.trang_thai,
                   n.ten_nha, l.ten_loai
            FROM phong p JOIN nha_tro n ON n.ma_nha = p.ma_nha
            JOIN loai_phong l ON l.ma_loai = p.ma_loai WHERE 1 = 1';
    $params = [];
    if ($keyword !== '') {
        $sql .= ' AND (p.so_phong LIKE ? OR n.ten_nha LIKE ?)';
        $like = '%' . $keyword . '%';
        array_push($params, $like, $like);
    }
    if ($status !== '') {
        $sql .= ' AND p.trang_thai = ?';
        $params[] = $status;
    }
    return db()->fetchAll($sql . ' ORDER BY p.ma_phong DESC LIMIT 100', $params);
}

function createRoom(int $houseId, int $typeId, string $roomNumber, int $floor, int $price, string $status): string
{
    db()->execute(
        'INSERT INTO phong (ma_nha, ma_loai, so_phong, tang, gia_thue, trang_thai) VALUES (?, ?, ?, ?, ?, ?)',
        [$houseId, $typeId, $roomNumber, $floor, $price, $status]
    );
    return db()->insertId();
}

function adminContracts(): array
{
    return db()->fetchAll(
        "SELECT h.ma_hd, k.ho_ten, p.so_phong, n.ten_nha, h.ngay_bat_dau, h.ngay_ket_thuc, h.trang_thai
         FROM hop_dong h
         JOIN khach_thue k ON k.ma_khach = h.ma_khach
         JOIN phong p ON p.ma_phong = h.ma_phong
         JOIN nha_tro n ON n.ma_nha = p.ma_nha
         ORDER BY h.ma_hd DESC LIMIT 100"
    );
}

function roomStatistics(): array
{
    return db()->fetchAll('SELECT trang_thai, COUNT(*) AS so_luong FROM phong GROUP BY trang_thai');
}
