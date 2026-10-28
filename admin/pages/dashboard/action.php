<?php
declare(strict_types=1);

$dashboardStats = [];
foreach (roomStatistics() as $row) {
    $dashboardStats['Phòng ' . $row['trang_thai']] = (int) $row['so_luong'];
}
