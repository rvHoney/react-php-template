<?php
class LogRequest
{
    public static function SaveLog()
    {
        $date = date('Y-m-d H:i:s');
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];
        $ip = $_SERVER['REMOTE_ADDR'];

        file_put_contents('data/logs.txt', "[$date][$ip] - [$method] $url\n", FILE_APPEND);
    }
}
?>