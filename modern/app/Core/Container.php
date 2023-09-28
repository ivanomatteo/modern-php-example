<?php

namespace App\Core;

use Closure;

class Container
{
    private $register = [];
    private $singletons = [];


    public function make(string $identifier)
    {
        if (($this->singletons[$identifier] ?? null) !== null) {
            return $this->singletons[$identifier];
        }

        $result = $this->create($identifier);

        if (
            array_key_exists($identifier, $this->singletons) &&
            $this->singletons[$identifier] === null
        ) {
            $this->singletons[$identifier] = $result;
        }

        return $result;
    }

    private function create(string $identifier)
    {
        $factory = $this->register[$identifier] ?? null;
        if (is_string($factory)) {
            if (class_exists($identifier)) {
                return new $identifier;
            }
        } elseif ($factory) {
            return $factory();
        }

        return null;
    }

    public function bind(string $identifier, string|Closure|callable $factory): static
    {
        $this->register[$identifier] = $factory;
        return $this;
    }

    public function singleton($identifier, string|Closure|callable $factory = null): static
    {
        if ($factory) {
            $this->bind($identifier, $factory);
        }
        $this->singletons[$identifier] = true;
        return $this;
    }
}
