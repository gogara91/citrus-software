<?php

namespace App\Model;
require_once 'Model.php';

class Comment Extends Model {

    public function __construct()
    {
        parent::__construct();
        $this->table = 'comments';
    }
}