<?php

declare(strict_types=1);

namespace App\Core;

final class Database
{
    private string $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function all(): array
    {
        if (!is_file($this->file)) {
            return ['products' => [], 'orders' => []];
        }

        $content = file_get_contents($this->file);
        $data = json_decode($content ?: '{}', true);

        return is_array($data) ? $data : ['products' => [], 'orders' => []];
    }

    public function get(string $key): array
    {
        $data = $this->all();
        return isset($data[$key]) && is_array($data[$key]) ? $data[$key] : [];
    }

    public function set(string $key, array $value): void
    {
        $data = $this->all();
        $data[$key] = $value;

        file_put_contents(
            $this->file,
            json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            LOCK_EX
        );
    }
}
