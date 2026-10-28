<?php
declare(strict_types=1);

$query = trim((string) ($_GET['q'] ?? ''));
$type = (string) ($_GET['type'] ?? '');
$max = filter_input(INPUT_GET, 'max', FILTER_VALIDATE_INT) ?: 0;
$status = (string) ($_GET['status'] ?? '');
$validStatuses = ['Trống', 'Đang thuê', 'Bảo trì'];
$status = in_array($status, $validStatuses, true) ? $status : '';
$rooms = publicRooms($query, $type, max(0, $max), $status);
$types = roomTypes();
