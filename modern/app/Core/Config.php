<?php

namespace App\Core;

class Config
{
    private array $cfg = [
        'foo' => 'bar',
    ];

    public function __construct()
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }

    public function get(string $key): int|float|string|array
    {
        return $this->cfg[$key];
    }

    public function set(string $key, int|float|string|array $value): void
    {
        $this->cfg[$key] = $value;
    }
}
