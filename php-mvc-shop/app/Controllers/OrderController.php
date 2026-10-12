<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Order;

final class OrderController extends Controller
{
    public function checkout(): void
    {
        $items = CartController::currentItems();

        if (!$items) {
            $this->redirect('/cart');
        }

        $total = array_sum(array_column($items, 'subtotal'));
        $this->view('orders/checkout', compact('items', 'total'));
    }

    public function store(): void
    {
        $name = trim((string) ($_POST['name'] ?? ''));
        $phone = trim((string) ($_POST['phone'] ?? ''));
        $address = trim((string) ($_POST['address'] ?? ''));
        $items = CartController::currentItems();

        if ($name === '' || $phone === '' || $address === '' || !$items) {
            $error = 'Vui lòng nhập đầy đủ thông tin';
            $total = array_sum(array_column($items, 'subtotal'));
            $this->view('orders/checkout', compact('items', 'total', 'error'));
            return;
        }

        $products = array_map(static function (array $item): array {
            return [
                'id' => (int) $item['product']['id'],
                'name' => (string) $item['product']['name'],
                'price' => (int) $item['product']['price'],
                'quantity' => (int) $item['quantity'],
                'subtotal' => (int) $item['subtotal'],
            ];
        }, $items);

        $total = array_sum(array_column($products, 'subtotal'));
        $id = (new Order())->create([
            'customer' => compact('name', 'phone', 'address'),
            'items' => $products,
            'total' => $total,
            'status' => 'pending',
        ]);

        $_SESSION['cart'] = [];
        $this->view('orders/success', compact('id', 'total'));
    }
}
