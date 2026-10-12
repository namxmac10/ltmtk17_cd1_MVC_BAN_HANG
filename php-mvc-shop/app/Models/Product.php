<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

final class Product
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database(dirname(__DIR__, 2) . '/data/database.json');
    }

    public function all(): array
    {
        return $this->db->get('products');
    }

    public function find(int $id): ?array
    {
        foreach ($this->all() as $product) {
            if ((int) ($product['id'] ?? 0) === $id) {
                return $product;
            }
        }

        return null;
    }
}
