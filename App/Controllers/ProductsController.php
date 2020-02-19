<?php

namespace App\Controllers;
use App\Model\Product;
use App\Resources\JSON;
use App\Views\CreateProductPage;
use App\Views\ShowProductPage;

require_once 'Controller.php';

class ProductsController extends Controller {

    public function __construct()
    {
        $this->model('Product');
    }

    public function create()
    {
        $this->view('CreateProductPage');
        $view = new CreateProductPage();
        $view->html();

    }

    public function show()
    {
        $productId = (int) $_GET['id'];
        $product = new Product();
        $this->view('ShowProductPage');

        $view = new ShowProductPage($product->get($productId), $product->getComments($productId));
        $view->html();
    }

    public function store()
    {
        $errors = [];

        if(empty($_POST['title'])) {
            $errors['title'] = 'Title can\'t be empty.';
        }

        if(empty($_POST['image'])) {
            $errors['image'] = 'Image can\'t be empty.';
        }

        if(empty($_POST['description'])) {
            $errors['description'] = 'Description can\'t be empty.';
        }
        try {
            if(!empty($errors))
            {
                throw new \Exception(json_encode($errors));
            }
            $product = new Product();
            if(!$product->create($_POST)) {
                throw new \Exception(json_encode(['error' => 'Something went wrong trying to create product. Please try again later']));
            }
            JSON::response('OK', ['product_id' => $product->lastId]);
        } catch(\Exception $e) {
            JSON::response('Error', json_decode($e->getMessage()), 422);
        }
    }


}