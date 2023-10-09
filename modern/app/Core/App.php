<?php

namespace App\Core;

/** 
 * @method mixed make(string $identifier)
 * @method mixed bind(string $identifier, string|Closure|callable $factory): Container
 */
class App
{
    // static singleton

    private static ?self $instance = null;

    public static function getApp(): self
    {
        return self::$instance ??= new self();
    }

    //class implementation

    public readonly Container $container;

    private function __construct()
    {
        $this->container = new Container();

        $this->container->singleton(Config::class)
            ->make(Config::class); //force instantiate Config class

        $this->container
            ->singleton(Router::class, function () {
                return new Router(__DIR__ . "/../../pages");
            })
            ->singleton(Auth::class)
            ->singleton(DB::class);
    }

    public function router(): Router
    {
        return $this->container->make(Router::class);
    }
    public function auth(): Auth
    {
        return $this->container->make(Auth::class);
    }
    public function config(): Config
    {
        return $this->container->make(Config::class);
    }
    public function db(): DB
    {
        return $this->container->make(DB::class);
    }

    public static function __callStatic($method, $args)
    {
        return call_user_func_array([static::getApp()->container, $method], $args);
    }
    public function __call($method, $args)
    {
        return call_user_func_array([$this->container, $method], $args);
    }
}
