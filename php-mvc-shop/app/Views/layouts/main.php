<?php

use App\Controllers\CartController;
?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mini Shop</title>
    <style>
        /* Reset cơ bản */
        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f4f6f8;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Header */
        .header {
            background: linear-gradient(90deg, #1976d2, #1565c0);
            color: #fff;
            padding: 15px 0;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .header .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .brand {
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            transition: opacity 0.2s ease;
        }

        .header .brand:hover {
            opacity: 0.8;
        }

        .header .cart-link {
            text-decoration: none;
            color: #fff;
            background: #0d47a1;
            padding: 8px 16px;
            border-radius: 6px;
            transition: background 0.2s ease;
        }

        .header .cart-link:hover {
            background: #08306b;
        }

        /* Main content */
        main.container {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }

        /* Footer */
        .footer {
            background: #1976d2;
            color: #fff;
            text-align: center;
            padding: 15px;
            font-size: 14px;
        }

        /* Cart styles */
        .cart-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 20px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            border: 1px solid #eee;
            border-radius: 8px;
            background: #fafafa;
            transition: box-shadow 0.2s ease;
        }

        .cart-item:hover {
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .cart-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 6px;
        }

        .cart-item .grow {
            flex: 1;
        }

        .qty {
            width: 60px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
        }

        .cart-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .cart-actions .total {
            font-size: 18px;
            font-weight: bold;
            color: #d32f2f;
        }

        .button {
            display: inline-block;
            padding: 10px 18px;
            background: #1976d2;
            color: #fff;
            border-radius: 6px;
            text-decoration: none;
            transition: background 0.2s ease;
        }

        .button:hover {
            background: #1565c0;
        }

        .secondary {
            background: #f5f5f5;
            color: #333;
            border: 1px solid #ccc;
            padding: 10px 18px;
            border-radius: 6px;
            cursor: pointer;
        }

        .secondary:hover {
            background: #e0e0e0;
        }

        .empty {
            text-align: center;
            padding: 30px;
        }
    </style>
</head>
<body>
<header class="header">
    <div class="container nav">
        <a class="brand" href="/">Mini Shop</a>
        <a class="cart-link" href="/cart">Giỏ hàng (<?= CartController::count() ?>)</a>
    </div>
</header>
<main class="container">
    <?= $content ?>
</main>
<footer class="footer">
    <div class="container">
        © <?= date('Y') ?> Mini Shop - All rights reserved.
    </div>
</footer>
</body>
</html>
