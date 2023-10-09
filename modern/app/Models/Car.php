<?php

namespace App\Models;



class Car
{
    private $name;

    function setName($name)
    {
        $this->name = $name;
    }
    function getName()
    {
        return $this->name;
    }

    function __toString()
    {
        return "Car: {$this->name}";
    }
}
