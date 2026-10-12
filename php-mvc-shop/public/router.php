<?php

declare(strict_types=1);

// Lấy path từ URL
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Xác định file tương ứng trong thư mục hiện tại
$file = __DIR__ . $path;

// Nếu không phải trang chủ và file tồn tại → trả về file tĩnh (CSS, JS, ảnh…)
if ($path !== '/' && is_file($file)) {
    return false;
}

// Ngược lại, chuyển cho index.php xử lý (router chính)
require __DIR__ . '/index.php';
