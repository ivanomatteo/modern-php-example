<?php

namespace App\Core;

use PDO;

class DB
{
    public readonly PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("sqlite::" . __DIR__ . "./../../database.sqlite");
    }
}
