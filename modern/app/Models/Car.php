<?php

namespace App\Models;



class Car
{
    private $name;


    public function __construct($name)
    {
        $this->name = $name;
    }

    function __toString()
    {
        return "Car: {$this->name}";
    }
}
