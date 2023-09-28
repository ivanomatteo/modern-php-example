<?php

namespace App\Core;

class Router
{
    public function __construct(private string $root)
    {

    }
    
    public function routeRequest(): void
    {
        $urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $urlPath = preg_replace('/^index\\.php/i', '', $urlPath);
        $urlPath = preg_replace('/[^a-z0-9_\\/-]/i', '', $urlPath);
        $urlPath = strtolower(trim(trim($urlPath, "/")));

        if (empty($urlPath)) {
            $urlPath = 'home';
        }

        require $this->root . '/' . $urlPath . '.php';
    }
}
