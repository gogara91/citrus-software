<?php

namespace App\Views;

use App\Builders\PageBuilder;
require_once APP_ROOT . 'Builders/PageBuilder.php';

class View {
    protected $builder;
    public function __construct()
    {
        $this->builder = new PageBuilder();
    }
}