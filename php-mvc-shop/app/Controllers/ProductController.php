<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;

final class ProductController extends Controller
{
    public function index(): void
    {
        $products = (new Product())->all();
        $this->view('products/index', compact('products'));
    }

    public function show(string $id): void
    {
        $product = (new Product())->find((int) $id);

        if (!$product) {
            http_response_code(404);
            echo 'Sản phẩm không tồn tại';
            return;
        }

        $this->view('products/show', compact('product'));
    }
}
