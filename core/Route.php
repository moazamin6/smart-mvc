<?php


namespace Core;


class Route
{
    public $url_array = array();
    private $parameters = [];
    private $url_action = '';
    private $url = '';

    public function __construct()
    {

    }

    public function setRoute($uri = null, $action = null)
    {
        $seg_count = 0;
        $param_count = 0;
        if ($uri !== '/') {
            $url_segments = explode('/', $uri);
        } else {
            $url_segments = [];
            $seg_count = 1;
        }

        foreach ($url_segments as $seg) {
            $seg_count++;
            if (strpos($seg, '{') !== false) {

                $param_count++;
            }
        }
        if ($uri != '/') {
            $uri = rtrim($uri, '/');
        }

        $uri = filter_var($uri, FILTER_SANITIZE_URL);
        $uri_with_no_params = $this->getURIWithoutParams($uri);
        $diff = $seg_count - $param_count;
        //$uri = '{' . substr($uri, strpos($uri, "{") + 1);
        //$this->url_array[$uri] = $action;
        $this->url_array[] = array(
            'uri' => $uri,
            'uri_no_params' => $uri_with_no_params,
            'action' => $action,
            'segments' => $seg_count,
            'params' => $param_count,
            'diff' => $diff,
        );
    }

    public function loadRoute()
    {
        //print_r($this->url_array);
        $url = $this->getUrl();
        //echo $url;


        if ($this->verifyRoute($url)) {

            $controllerName = explode('@', $this->url_action)[0];
            $functionName = explode('@', $this->url_action)[1];

            if ($path = researchFile(Config::get('controller_base_url'), $controllerName . '.php')) {

                //echo CONTROLLER_PATH . '/' . $controllerName . '.php';
                //$path = CONTROLLER_PATH . '/' . $controllerName . '.php';

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                    $this->parameters[] = Request::getRequestInstance($_POST);
                } else {
                    $this->parameters[] = Request::getRequestInstance($_GET);
                }
                $namespace = extractNamespace($path) . "\\" . $controllerName;

                $controllerOBJ = new $namespace();

                if (method_exists($namespace, $functionName)) {

                    call_user_func_array([$controllerOBJ, $functionName], $this->parameters);
                } else {
                    $data['name'] = $this->url_action;
                    loadCoreView('method_not_found', $data);

                }
            } else {
                $data['name'] = $this->url_action;
                loadCoreView('controller_not_found', $data);
            }

        } else {
            $data['name'] = $_SERVER['REQUEST_URI'];
            loadCoreView('url_not_found', $data);
            exit(1);
        }
    }

    private function getUrl()
    {
        if (isset($_GET['url'])) {
            $query_string = $_GET['url'];
            $url = rtrim($query_string, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //$url = explode('/', $url);

            return $url;
        } else {
            return '/';
        }
    }

    private function verifyRoute($url)
    {
        foreach ($this->url_array as $stored_uri) {


            $is_matched = $this->matchURI($url, $stored_uri['uri_no_params'], $stored_uri['diff'], $stored_uri['segments'], $stored_uri['params']);
            if ($is_matched) {

                //print_r($stored_uri);
                $this->url_action = $stored_uri['action'];
                $this->url = $stored_uri['uri'];
                return true;
            }

        }
        return false;
    }

    private function matchURI($url_seg, $no_params_uri, $diff_count, $segs, $params)
    {

        $parsed_url = $this->parseURL($url_seg, $diff_count, $segs, $params);
        if (count(explode("/", $parsed_url)) == $diff_count) {


            if ($parsed_url == $no_params_uri) {

                return true;
            }

        } else {
            return false;
        }
    }

    private function getURIWithoutParams($uri)
    {
        //return $uri;
        $url = '';
        if (preg_match('/{/', $uri)) {


            $segs = explode("/", $uri);

            foreach ($segs as $s) {
                if (!preg_match('/{/', $s)) {
                    $url = $url . '/' . $s;
                }
            }
            $url = ltrim($url, '/');
            return $url;
        } else {
            return $uri;
        }
    }

    private function parseURL($url, $count, $segs, $params)
    {
        $this->parameters = array();
        if ($url == '/') {
            return true;
        }
        $url = explode("/", $url);

        $parsed_url = '';
        $params_array = array_reverse($url);
        //print_r($params_array);
        if ($params != 0) {
            for ($i = $params - 1; $i >= 0; $i--) {

                $this->parameters[] = $params_array[$i];
            }
        }
        if ($count == 1) {

            if (count($url) == $segs) {
                return $url[0];
            }

        }
        for ($i = 0; $i < $count; $i++) {
            if (count($url) == $segs) {
                $parsed_url = $parsed_url . '/' . $url[$i];
            }

        }

        $parsed_url = ltrim($parsed_url, '/');
        return $parsed_url;
    }

    public static function is($url)
    {
        $url = base_url($url);
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $link = "https";
        else
            $link = "http";
        $link .= "://";
        $link .= $_SERVER['HTTP_HOST'];
        $link .= $_SERVER['REQUEST_URI'];

        if ($url == $link) {

            return true;
        } else {
            return false;
        }
    }
}