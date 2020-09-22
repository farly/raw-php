<?php

namespace app\config;

class Routes
{
    private $routes;

    public function __construct()
    {
        $this->routes = array(
            'home' => array(
                'pattern' => '/',
                'controller' => 'src\controller\HomeController',
                'action' => 'home'
            )
        );
    }


    public function matchRoute($pattern)
    {
        foreach($this->routes as $key => $route) {
            if ($pattern == $route['pattern']) {
                return $this->routes[$key];
            } else {
                new \Exception('No reoutes found');
            }
        }

        return null;
    }
}




