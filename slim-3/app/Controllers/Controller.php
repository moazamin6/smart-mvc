<?php

namespace App\Controllers;



class Controller
{

    protected $container;

    public function __construct($container)
    {
        echo 'conttt';
        $this->container = $container;
    }

    public function __get($name)
    {
        if ($this->container->{$name}) {

            return $this->container->{$name};
        }
    }
}