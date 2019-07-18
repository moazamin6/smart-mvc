<?php


namespace Core;


class Route
{
    private $url_array = array();
    private $controller_path;
    private $parameters = null;

    public function __construct()
    {
        $this->controller_path = APPROOT . '/application/controllers';
    }

    public function setRoute($uri = null, $action = null)
    {
        $seg_count = 0;
        $param_count = 0;
        echo '<pre>';
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
        $uri = rtrim($uri, '/');
        $uri = filter_var($uri, FILTER_SANITIZE_URL);

        $diff = $seg_count - $param_count;
        //$uri = '{' . substr($uri, strpos($uri, "{") + 1);
        //$this->url_array[$uri] = $action;
        $this->url_array[] = array(
            'uri' => $uri,
            'action' => $action,
            'segments' => $seg_count,
            'params' => $param_count,
            'diff' => $diff,
        );
    }

    public function loadRoute()
    {
        print_r($this->url_array);
        $url = $this->getUrl();
        echo $url;
        $this->verifyRoute($url);
        if (array_key_exists($url, $this->url_array)) {

            $action = $this->url_array[$url];
            $controllerName = explode('@', $action)[0];
            $functionName = explode('@', $action)[1];

            if ($path = researchFile($this->controller_path, $controllerName . '.php')) {

                //echo CONTROLLER_PATH . '/' . $controllerName . '.php';
                //$path = CONTROLLER_PATH . '/' . $controllerName . '.php';

                $namespace = extractNamespace($path) . "\\" . $controllerName;
                $controllerOBJ = new $namespace();
                //$controllerOBJ = new $controllerName();

                if (method_exists($namespace, $functionName)) {

                    call_user_func_array([$controllerOBJ, $functionName], []);
                } else {
                    echo 'method not found';
                }
            } else {
                echo 'controller not found';
            }

        } else {
            echo 'url not found';
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
        if ($url == '/') {
            return true;
        }
        $url_seg = explode('/', $url);
        //print_r($url_seg);
        foreach ($this->url_array as $stored_uri) {

            for ($i = 0; $i < $stored_uri['diff']; $i++) {

                echo $stored_uri['uri'];
                echo '<br>';
                //$this->matchURI($url_seg, $stored_uri['uri'], $stored_uri['diff']);

            }
            echo '<br>';
            //print_r($stored_uri['uri'] . '/////');
        }
    }

    private function matchURI($url_seg, $diff, $count)
    {
        $diff_array = explode('/', $diff);
        print_r($diff);
        $correction = 0;
        foreach ($url_seg as $u) {
            foreach ($diff_array as $u2) {

                echo $u . ' == ' . $u2;
                echo '<br>';
//                if ($u == $u2l) {
//                    $correction++;
//                    if ($correction == $count) {
//                        die('matched');
//                        return true;
//                    }
//                    //break;
//                }

            }
        }
        die('No matched');
        return false;
    }
}