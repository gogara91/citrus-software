<?php

class Router {
    private $url;
    private $routes;
    public function __construct()
    {
        $this->url = $this->getUrl();
        $this->routes = [
            ['url' => '', 'controller' => 'App\Controllers\HomeController@index', 'file_name' => 'HomeController'],
            ['url' => 'admin', 'controller' => 'App\Controllers\AdminController@index', 'file_name' => 'AdminController'],
            ['url' => 'products/create', 'controller' => 'App\Controllers\ProductsController@create', 'file_name' => 'ProductsController'],
            ['url' => 'products/store', 'controller' => 'App\Controllers\ProductsController@store', 'file_name' => 'ProductsController'],
            ['url' => 'product', 'controller' => 'App\Controllers\ProductsController@show', 'file_name' => 'ProductsController'],
            ['url' => 'comments/create', 'controller' => 'App\Controllers\CommentsController@store', 'file_name' => 'CommentsController'],
            ['url' => 'comments', 'controller' => 'App\Controllers\CommentsController@index', 'file_name' => 'CommentsController'],
            ['url' => 'comments/update', 'controller' => 'App\Controllers\CommentsController@update', 'file_name' => 'CommentsController'],
        ];
        $this->runRouter();
    }

    private function runRouter()
    {
        foreach($this->routes as $route) {
            if($route['url'] !== $this->url) {
                continue;
            }

            $controller = explode('@',  $route['controller']);
            $className = $controller[0];
            $method = $controller[1];
            require_once APP_ROOT . 'Controllers/' . $route['file_name'] . '.php';
            call_user_func_array([new $className, $method], []);
            return;
        }
    }

    private function getUrl()
    {
        if(!isset($_GET['url'])) {
            return '';
        }
        return $_GET['url'];
    }

}