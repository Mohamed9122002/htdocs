<?php

namespace Core\Middleware;
class Middleware {
    public const MAP = [
        'guest' => Guest::class,
        'authenticated' => Authenticated::class,
    ];
    public static function resolve($key){
        if(!$key){
            return;
        }
        $middleware = static::MAP[$key] ?? null;
        if(!$middleware){
            throw new \Exception("Middleware not found: {$key}");
        }
        (new $middleware())->handle();
    }
}