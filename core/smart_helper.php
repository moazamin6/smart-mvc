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
        $asset_url = \Core\Config::get('asset_url');
        if ($url == null) {
            return $asset_url;
        }

        return $asset_url . '/' . $url;
    }
}

if (!function_exists('base_url')) {

    function base_url($url = '')
    {
        if ($url == '/') {
            return \Core\Config::get('base_url') . '/public/';
        }
        return \Core\Config::get('base_url') . '/public/' . $url;
    }
}

if (!function_exists('app_url')) {

    function app_url($url = '')
    {
        if ($url == '/') {
            return \Core\Config::get('app_url');
        }
        return \Core\Config::get('app_url') . '/' . $url;
    }
}

if (!function_exists('loadPartialView')) {

    function loadPartialView($view, $data = [])
    {
        if (!is_object($data)) {
            extract($data);
        }

        $file_path = \Core\Config::get('view_base_url') . '/' . $view . '.php';
        if (file_exists($file_path)) {

            include_once $file_path;
        } else {
            include_once \Core\Config::get('core_view_base_url') . '/view_not_found.php';
            die();
        }
    }
}

if (!function_exists('redirectTo')) {

    function redirectTo($url, $permanent = false)
    {
        $url = base_url($url);
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

if (!function_exists('d')) {
    function d($args)
    {
        echo '<pre>';
        print_r($args);
        echo '</pre>';
    }
}

if (!function_exists('instance')) {
    function instance($fname, $lname, $type)
    {
        return $type($fname . ' ' . $lname);
    }
}