<?php
return [

    'app_name' => 'Smart MVC',

    'app_url' => 'http://localhost:8080/smart_mvc_git',


    'base_url' => 'http://localhost:8080/smart_mvc_git/public',


    'app_root' => dirname(dirname(__FILE__)),


    'asset_url' => 'http://localhost:8080/smart_mvc_git/public',


    'model_base_url' => dirname(dirname(__FILE__)) . '/application/models',


    'model_namespace' => 'Application\Models',


    'view_base_url' => dirname(dirname(__FILE__)) . '/application/views',


    'controller_base_url' => dirname(dirname(__FILE__)) . '/application/controllers',


    'controller_namespace' => 'Application\Controllers',


    'middleware_base_url' => dirname(dirname(__FILE__)) . '/application/Middleware',


    'middleware_namespace' => 'Application\Middleware',


    'core_view_base_url' => dirname(dirname(__FILE__)) . '/core/views',


    //database configuration
    'db_host' => 'localhost',

    'db_user' => 'root',

    'db_pass' => 'admin',

    'db_name' => 'smart_mvc',
];