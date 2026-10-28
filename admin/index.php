<?php
declare(strict_types=1);

require_once __DIR__ . '/../database/functions.php';

$routes = [
    'dashboard' => [
        'title' => 'Tổng quan | HB Home Admin',
        'module' => 'dashboard',
    ],
    'rooms' => [
        'title' => 'Quản lý phòng | HB Home Admin',
        'module' => 'rooms',
    ],
    'history' => [
        'title' => 'Lịch sử thao tác | HB Home Admin',
        'module' => 'history',
    ],
];

$page = $_GET['page'] ?? 'dashboard';

if (!is_string($page) || !isset($routes[$page])) {
    http_response_code(404);
    $page = 'dashboard';
    $notFound = true;
}

$route = $routes[$page];
$modulePath = __DIR__ . '/pages/' . $route['module'];

require $modulePath . '/action.php';
require __DIR__ . '/layouts/header.php';
require __DIR__ . '/layouts/sidebar.php';
require $modulePath . '/index.php';
require __DIR__ . '/layouts/footer.php';
