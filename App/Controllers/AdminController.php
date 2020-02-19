<?php

namespace App\Controllers;
use App\Views\AdminPage;

require_once 'Controller.php';

class AdminController extends Controller {
    public function index()
    {
        $this->view('AdminPage');
        $view = new AdminPage();
        $view->html();
    }

}