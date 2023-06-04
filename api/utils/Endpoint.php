<?php
class Endpoint
{
    public $method;
    public $url;
    public $callback;
    public $auth;

    public function __construct($method, $url, $callback, $auth = false)
    {
        $this->method = $method;
        $this->url = $this->urlToRegex(API_PREFIX . $url);
        $this->callback = $callback;
        $this->auth = $auth;

        $this->checkIfCalled();
    }

    public function urlToRegex($url)
    {
        $regex = preg_replace('/\//', '\/', $url);
        $regex = preg_replace('/\?/', '\?', $regex);
        $regex = preg_replace('/\=/', '\=', $regex);
        $regex = preg_replace('/\&/', '\&', $regex);
        $regex = preg_replace('/\{float\}/i', '([0-9]+\.[0-9]+)', $regex);
        $regex = preg_replace('/\{int\}/i', '([0-9]+)', $regex);
        $regex = preg_replace('/\{string\}/i', '([^\/]+)', $regex);
        $regex = preg_replace('/\{bool\}/i', '(true|false)', $regex);
        $regex = preg_replace('/\{any\}/i', '(.+)', $regex);
        $regex = '/^' . $regex . '$/i';
        return $regex;
    }

    public function checkIfCalled()
    {
        if ($_SERVER['REQUEST_METHOD'] != $this->method) {
            return false;
        }
        if (preg_match($this->url, $_SERVER['REQUEST_URI'], $matches)) {
            array_shift($matches);
            $params = $matches;

            foreach ($params as $key => $param) {
                if (is_numeric($param)) {
                    $params[$key] = (int) $param;
                } else if ($param == 'true') {
                    $params[$key] = true;
                } else if ($param == 'false') {
                    $params[$key] = false;
                }
            }

            if ($this->auth) {
                if (!isset($_SERVER['HTTP_API_KEY'])) {
                    return false;
                }
                $apiKey = $_SERVER['HTTP_API_KEY'];
                $apiKeys = json_decode(file_get_contents('data/apikeys.json'), true);
                if (!in_array($apiKey, $apiKeys)) {
                    return false;
                }
            }
            call_user_func_array($this->callback, $params);

            return true;
        }
        return false;
    }
}
?>