<?php

namespace App\Model;
require_once 'Model.php';
require_once 'Comment.php';

class Product Extends Model {

    public function __construct()
    {
        parent::__construct();
        $this->table = 'products';
    }

    public function getComments($productId)
    {
        $comments = new Comment();
        if(!$results = $comments->getBy(["product_id = {$productId}", 'approved = 1'])) {
            return [];
        }
        return $results;
    }


}