<?php

namespace App\Middleware;

class Middleware
{
    protected $container;

    public function __construct($container = null)
    {
        $this->container = $container;
    }
}