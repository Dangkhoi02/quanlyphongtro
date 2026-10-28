<?php
declare(strict_types=1);

require_once __DIR__ . '/database/functions.php';

$routes = [
    'home' => [
        'title' => 'Trang chủ | HB Home',
        'module' => 'home',
    ],
    'rooms' => [
        'title' => 'Tất cả phòng | HB Home',
        'module' => 'rooms',
    ],
];

$page = $_GET['page'] ?? 'home';

if (!is_string($page) || !isset($routes[$page])) {
    http_response_code(404);
    $page = 'home';
    $notFound = true;
}

$route = $routes[$page];
$modulePath = __DIR__ . '/pages/' . $route['module'];

require $modulePath . '/action.php';
require __DIR__ . '/layouts/public/header.php';
require $modulePath . '/index.php';
require __DIR__ . '/layouts/public/footer.php';
