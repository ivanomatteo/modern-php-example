<?php


class Person
{
    private $name;


    public function __construct($name)
    {
        $this->name = $name;
    }

    function __toString()
    {
        return "Person: {$this->name}";
    }
}
