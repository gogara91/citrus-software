<?php

namespace App\Controllers;
use App\Model\Product;
use App\Model\Comment;
use App\Views\HomePage;

require_once 'Controller.php';

class HomeController extends Controller {

    public function index()
    {
        $this->model('Product');
        $this->model('Comment');

        $product = new Product();
        $comment = new Comment();
        $this->view('HomePage');
        $view = new HomePage($product->getAll(9), $comment->getBy(['approved = 1']));
        $view->html();
    }

}