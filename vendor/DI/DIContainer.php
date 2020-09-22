<?php

namespace vendor\DI;

use vendor\DI\Pimple;
use vendor\Yaml\YamlLoader;

class DIContainer
{
    public function __construct()
    {
        $this->container = new Pimple();

        $file = __DIR__."..". DIRECTORY_SEPARATOR ."..". DIRECTORY_SEPARATOR. "..". DIRECTORY_SEPARATOR. "config/services.yml";
        $services = (new YamlLoader)->parse()['services'];
        $this->init($services);
    }

    public function get($key)
    {
        $service = null;

        if (isset($this->container[$key])) {
            $service = $this->container[$key];
        }

        return $service;
    }

    /**
     * initializes the services
     * @param  mixed $services [description]
     */
    private function init($services)
    {
        foreach ($services as $key => $service) {
            $this->_initializeService($key, $service);
        }
    }

    private function _initiliazeArguments($key, $arguments)
    {
        // foreach ($)
    }

    private function _initializeService($key, $service)
    {
        if (!isset($this->container[$key])) {
                if (!isset($service['arguments'])) {
                    $this->initiliazeArguments($service[$arguments]);
                } else {
                    $this->container[$key] = function ($service) {
                        return (new ReflectionClass($service['class']))->newInstance();
                    }
                }
            }
    }
}