<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($route['title'], ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/admin-forms.css">
    <?php if ($page === 'rooms'): ?>
        <link rel="stylesheet" href="../assets/css/admin-rooms.css">
    <?php endif; ?>
    <?php if ($page === 'history'): ?>
        <link rel="stylesheet" href="../assets/css/admin-operations.css">
    <?php endif; ?>
</head>
<body>
    <div class="hb-admin-layout">