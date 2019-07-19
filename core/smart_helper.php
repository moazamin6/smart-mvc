<?php

if (!function_exists('extractNamespace')) {

    function extractNamespace($file)
    {
        $ns = NULL;
        $handle = fopen($file, "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                if (strpos($line, 'namespace') === 0) {
                    $parts = explode(' ', $line);
                    $ns = rtrim(trim($parts[1]), ';');
                    break;
                }
            }
            fclose($handle);
        }
        return $ns;
    }
}

if (!function_exists('researchFile')) {

    function researchFile($folder, $pattern)
    {
        $iti = new RecursiveDirectoryIterator($folder);
        foreach (new RecursiveIteratorIterator($iti) as $file) {
            if (strpos($file, $pattern) !== false) {
                return $file;
            }
        }
        return false;
    }
}

if (!function_exists('smartPrint')) {

    function smartPrint($txt)
    {
        echo '<br>';
        echo $txt;
        echo '<br>';
    }
}

if (!function_exists('assets')) {

    function assets($url = null)
    {
        if ($url == null) {
            return URLROOT . '/public';
        }

        return URLROOT . '/public/' . $url;
    }
}

if (!function_exists('url')) {

    function url($url)
    {
        if ($url == '/') {
            return URLROOT . '/public/';
        }
        return URLROOT . '/public/' . $url;
    }
}

if (!function_exists('loadPartialView')) {

    function loadPartialView($view, $data = [])
    {
        $view_path = APPROOT . '/application/views';
        $file_path = $view_path . '/' . $view . '.php';
        if (file_exists($file_path)) {

            include_once $file_path;
        } else {
            die('view not found');
        }
    }
}

if (!function_exists('redirectTo')) {

    function redirectTo($url, $permanent = false)
    {
        $url = url($url);
        if (headers_sent() === false) {
            header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
        }
        exit();
    }
}


if (!function_exists('dd')) {
    function dd($args)
    {
        echo '<pre>';
        print_r($args);
        echo '</pre>';
        die;
    }
}