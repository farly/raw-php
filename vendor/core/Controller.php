<?php

namespace vendor\core;


class Controller extends vendor\DI\DIContainer
{
    public function get($key)
    {
        $service = parent::get($key);

        return $service;
    }
}