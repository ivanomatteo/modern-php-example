<?php

namespace App\Models;


class Person
{
    public function __construct(private $name)
    {
        $this->name = $name;
    }

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
