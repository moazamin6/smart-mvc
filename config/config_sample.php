<?php
return [

    'app_name' => 'Smart MVC',


    'base_url' => 'http://localhost:8080/smart_mvc_git',


    'app_root' => dirname(dirname(__FILE__)),


    'asset_url' => 'http://localhost:8080/smart_mvc_git/public',


    'model_base_url' => dirname(dirname(__FILE__)) . '/application/models',


    'model_namespace' => 'Application\Models',


    'view_base_url' => dirname(dirname(__FILE__)) . '/application/views',


    'controller_base_url' => dirname(dirname(__FILE__)) . '/application/controllers',


    'controller_namespace' => 'Application\Controllers',


    //database configuration
    'db_host' => 'localhost',

    'db_user' => 'root',

    'db_pass' => 'admin',

    'db_name' => 'smart_mvc',
];