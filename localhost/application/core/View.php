<?php

namespace application\core;

class View
{

    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    public function render($title, $vars = [])
    {
        extract($vars);
        $path = 'application/views/' . $this->path . '.php';
        if (file_exists($path)) {
            ob_start();
            require_once $path;
            $content = ob_get_clean();
            require 'application/views/layouts/' . $this->layout . '.php';
        }
    }
    
    //Вызов страницы с ошибкой
    public static function errorCode($code)
    {
        http_response_code($code);
        $path = 'application/views/errors/' . $code . '.php';
        if (file_exists($path)) {
            require $path;
        }
        exit;
    }

    //Вывод алерта при ошибках
    public function message($status, $message)
    {
        exit(json_encode(['status' => $status, 'message' => $message]));
    }

    public function redirect($url)
    {
        header('location: ' . $url);
        exit;
    }

    //Перенаправление при работе с jquery
    public function location($url)
    {
        exit(json_encode(['url' => $url]));
    }
}
