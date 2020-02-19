<?php
namespace App\Views;

require_once 'View.php';

class ShowProductPage extends View {
    private $product;
    private $comments;
    public function __construct(array $product, array $comments = [])
    {
        parent::__construct();
        $this->product = $product;
        $this->comments = $comments;
    }

    public function html()
    {
        $this->builder->setScript('/js/comment.js');
        $this->builder->startPage();
        ?>
            <div class="row">
                <div class="col-md-6">
                    <img class="img-fluid" src="<?= $this->product['image']?>" />
                    <hr>
                    <h3><?= $this->product['title'] ?></h3>
                    <p><?= $this->product['description'] ?></p>
                    <hr>
                </div>
                <div class="col-md-6">
                    <?php if(!empty($this->comments)) : ?>
                    <h5 class="mb-3">Comments: </h5>
                        <?php foreach($this->comments as $comment) : ?>
                            <div class="card mb-3">
                                <div class="card-header">
                                    <?= $comment['name'] ?> - <?= $comment['email'] ?>
                                </div>
                                <div class="card-body">
                                    <?= $comment['body'] ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                    No comments found...
                    <?php endif; ?>
                    <hr>
                    <div id="add-comment-form">
                        <h5>Add comment</h5>
                        <div class="form-group">
                            <input
                                    type="text"
                                    id="name"
                                    placeholder="Type in your name"
                                    class="form-control"
                            >
                            <p class="text-danger d-none" id="name_error"></p>
                        </div>
                        <div class="form-group">
                            <input
                                    type="email"
                                    id="email"
                                    placeholder="Type in your email"
                                    class="form-control"
                            >
                            <p class="text-danger d-none" id="email_error"></p>
                        </div>
                        <div class="form-group">
                        <textarea
                                id="body"
                                placeholder="Your comment..."
                                class="form-control"
                                rows="6"
                        ></textarea>
                        <p class="text-danger d-none" id="body_error"></p>
                        </div>
                        <div class="form-gorup text-right">
                            <button
                                    type="button"
                                    class="btn btn-primary"
                                    onclick="createNewComment(<?= $this->product['id'] ?>)"
                            >
                                Add comment
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>

        <?php
        $this->builder->endPage();
    }

}