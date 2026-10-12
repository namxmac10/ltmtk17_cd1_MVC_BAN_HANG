<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;

final class CartController extends Controller
{
    public function index(): void
    {
        $items = $this->items();
        $total = array_sum(array_column($items, 'subtotal'));

        // Hiển thị view giỏ hàng
        $this->view('cart/index', compact('items', 'total'));
    }

    public function add(): never
    {
        $id = (int) ($_POST['id'] ?? 0);
        $product = (new Product())->find($id);

        if ($product) {
            $_SESSION['cart'][$id] = (int) ($_SESSION['cart'][$id] ?? 0) + 1;
        } else {
            // Có thể thêm flash message: "Sản phẩm không tồn tại"
        }

        $this->redirect('/cart');
    }

    public function update(): never
    {
        $quantities = $_POST['quantity'] ?? [];

        if (is_array($quantities)) {
            foreach ($quantities as $id => $quantity) {
                $qty = max(0, (int) $quantity);

                if ($qty === 0) {
                    unset($_SESSION['cart'][(int) $id]);
                } else {
                    $_SESSION['cart'][(int) $id] = $qty;
                }
            }
        }

        $this->redirect('/cart');
    }

    public function remove(): never
    {
        $id = (int) ($_POST['id'] ?? 0);
        unset($_SESSION['cart'][$id]);

        $this->redirect('/cart');
    }

    public static function count(): int
    {
        return array_sum($_SESSION['cart'] ?? []);
    }

    public static function currentItems(): array
    {
        return (new self())->items();
    }

    /**
     * Lấy danh sách sản phẩm trong giỏ hàng
     */
    private function items(): array
    {
        $model = new Product();
        $items = [];

        foreach ($_SESSION['cart'] ?? [] as $id => $quantity) {
            $product = $model->find((int) $id);

            if (!$product) {
                continue;
            }

            $qty = max(1, (int) $quantity);
            $items[] = [
                'product'  => $product,
                'quantity' => $qty,
                'subtotal' => ((int) $product['price']) * $qty,
            ];
        }

        return $items;
    }
}
