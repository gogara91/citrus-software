<?php
namespace App\Views;

require_once 'View.php';

class HomePage extends View {
    private $products;
    private $comments;
    public function __construct(array $products, array $comments)
    {
        $this->products = $products;
        $this->comments = $comments;
        parent::__construct();
    }

    public function html()
    {
        $this->builder->startPage();
        ?>
        <div class="row">
        <?php
        if(!empty($this->products)) {
            foreach($this->products as $product) {
                echo "<div class='col-md-4'>";
                $this->builder->CardWithImage(
                    $product['title'],
                    $product['description'],
                    $product['image'],
                    ['href' => '/product?id=' . $product['id'], 'text' => 'Read more...']
                );
                echo "</div>";
            }
        } else {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <p>No products found...</p>
                </div>
            </div>
            <?php
        }
        ?>
        </div>

        <?php if(!empty($this->comments)) : ?>
        <div class="row  mt-5">
            <div class="col-md-12">
                Latest comments
            </div>
        </div>
        <div class="row">
        <?php foreach($this->comments as $comment) : ?>
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header">
                    <?= $comment['name'] ?> - <?= $comment['email'] ?>
                </div>
                <div class="card-body">
                    <?= $comment['body'] ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        </div>
        <?php else : ?>
        <div class="row mt-5">
            <div class="col-md-12">
                <hr>
                <p>No comments found...</p>
            </div>
        </div>
        <?php endif; ?>
        <?php

        $this->builder->endPage();
    }
}
