<?php

namespace App\Models;


class Person
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
        return "Person: {$this->name}";
    }
}
