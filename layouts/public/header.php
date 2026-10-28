<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($route['title'], ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <?php if ($page === 'rooms'): ?>
        <link rel="stylesheet" href="assets/css/rooms.css">
    <?php endif; ?>
</head>
<body>
    <header class="header">
        <div class="nav">
            <a class="brand" href="index.php?page=home">HB Home</a>
            <nav class="navlinks" aria-label="Điều hướng chính">
                <a href="index.php?page=home" <?= $page === 'home' ? 'aria-current="page"' : '' ?>>TRANG CHỦ</a>
                <a href="index.php?page=rooms" <?= $page === 'rooms' ? 'aria-current="page"' : '' ?>>TÌM PHÒNG</a>
            </nav>
            <div class="navright">
                <a href="admin/index.php?page=dashboard">⚙ ADMIN</a>
            </div>
        </div>
    </header>