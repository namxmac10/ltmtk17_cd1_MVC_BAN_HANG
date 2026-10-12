<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

final class Order
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database(dirname(__DIR__, 2) . '/data/database.json');
    }

    public function create(array $order): int
    {
        $orders = $this->db->get('orders');
        $last = end($orders);
        $id = is_array($last) ? ((int) ($last['id'] ?? 0) + 1) : 1;

        $order['id'] = $id;
        $order['created_at'] = date('Y-m-d H:i:s');
        $orders[] = $order;
        $this->db->set('orders', $orders);

        return $id;
    }
}
