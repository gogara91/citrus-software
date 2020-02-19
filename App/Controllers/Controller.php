<?php
namespace App\Controllers;
require_once APP_ROOT. 'Resources/JSON.php';

abstract class Controller {

    public function model($modelName)
    {
        $file = APP_ROOT . 'Models/' . $modelName . '.php';
        if(!file_Exists($file))
        {
            header('HTTP/1.0 404, Models not found');
            return;
        }
        require_once $file;
    }

    public function view($viewName)
    {
        $file = APP_ROOT . 'Views/' . $viewName . '.php';
        if(!file_Exists($file))
        {
            header('HTTP/1.0 404, View not found');
            return;
        }
        require_once $file;
    }

}