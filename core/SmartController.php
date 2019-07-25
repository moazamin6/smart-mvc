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

    public function __construct()
    {
    }

    protected function loadView($view, $data = [])
    {
        loadPartialView($view, $data);
//        if (!is_object($data)) {
//            extract($data);
//        }
//
//        $file_path = Config::get('view_base_url') . '/' . $view . '.php';
//        if (file_exists($file_path)) {
//
//            return include_once $file_path;
//            return;
//        } else {
//            smartPrint('View Not Found');
//            return;
//        }
    }

    public function loadModel($model)
    {

        $file_path = Config::get('model_base_url') . '/' . $model . '.php';
        if (file_exists($file_path)) {


            $model_namespace = extractNamespace($file_path) . "\\" . $model;
            $this->{strtolower($model)} = new $model_namespace();
        } else {

            $data['name'] = $model . '.php';
            loadCoreView('model_not_found', $data);
            die();
        }
    }
}