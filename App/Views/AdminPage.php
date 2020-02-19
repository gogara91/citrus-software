<?php
namespace App\Views;

require_once 'View.php';

class AdminPage extends View {

    public function __construct()
    {
        parent::__construct();
    }

    public function html()
    {
        $this->builder->includeAdminSidebar();
        $this->builder->startPage();
        $this->builder->endPage();
    }

}
