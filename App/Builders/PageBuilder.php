<?php

namespace App\Builders;

class PageBuilder {

    private $adminSidebar = false;
    private $scripts = [];
    public function startPage()
    {
        ?>
        <!doctype html>
        <html lang="en">
            <head>
                <title>This is title</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                <?php
                if(!empty($this->scripts)) {
                        foreach($this->scripts as $script) {
                            echo "<script src='{$script}'></script>";
                        }
                }
                ?>
            </head>
            <body>
        <?php
        $this->navbar();
        if(!$this->adminSidebar) {
            echo '<div class="container mt-3">';
        }
        else {
            echo '<div class="row">';
            $this->sidebar();
            echo '<div class="col-md-10">';
        }

    }

    public function endPage()
    {
        if($this->adminSidebar) {
            echo "</div>";
        }

        ?>
        </div>
        </body>
        </html>
        <?php

    }

    private function navbar()
    {
        ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/admin">Admin</a>
                    </li>
                </ul>
            </div>
        </nav>
        <?php
    }

    public function CardWithImage(string $title, string $description, string $img, array $url = [])
    {
        ?>
        <div class="card" style="100%;">
            <img class="card-img-top" src="<?= $img ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?= $title ?></h5>
                <p class="card-text"><?= $description ?></p>
                <?php if(!empty($url)) : ?>
                    <a href="<?= $url['href']?>" class="btn btn-primary"><?= $url['text'] ?></a>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }

    public function includeAdminSidebar()
    {
        $this->adminSidebar = true;
    }

    private function sidebar()
    {
        ?>
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/comments">
                            Comments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/products/create">
                            Create product
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <?php
    }

    public function setScript($src)
    {
        $this->scripts[] = $src;
    }
}