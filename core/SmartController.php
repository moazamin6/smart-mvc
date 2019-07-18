<?php
/**
 * Created by PhpStorm.
 * User: moaza
 * Date: 6/9/2019
 * Time: 2:39 PM
 */

namespace Core;


class SmartController
{
    private $view_path;
    protected $db;

    public function __construct()
    {
        $this->view_path = dirname(dirname(__FILE__)) . '/application/views/';
    }

    protected function loadView($view, $data = null)
    {
        $file_path = $this->view_path . $view . '.php';
        if (file_exists($file_path)) {

            include_once $file_path;
        } else {
            die('view not found');
        }
    }

    public function model()
    {

    }
}