<?php
/**
 * Created by PhpStorm.
 * User.php: moaza
 * Date: 6/9/2019
 * Time: 2:39 PM
 */

namespace Core;


class SmartController
{
    private $view_path;
    private $model_path;
    protected $db;

    public function __construct()
    {
        $this->view_path = APPROOT . '/application/views';
        $this->model_path = APPROOT . '/application/models';
    }

    protected function loadView($view, $data = null)
    {
        $file_path = $this->view_path . '/' . $view . '.php';
        if (file_exists($file_path)) {

            include_once $file_path;
        } else {
            die('view not found');
        }
    }

    public function loadModel($model)
    {

        $file_path = $this->model_path . '/' . $model . '.php';
        if (file_exists($file_path)) {

            $model_namespace = extractNamespace($file_path) . "\\" . $model;
            new $model_namespace();
        } else {
            smartPrint('file not found');
        }
    }
}