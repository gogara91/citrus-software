<?php

namespace App\Views;
require_once 'View.php';

class UnapprovedCommentsView extends View {
    private $comments;
    public function __construct(array $comments)
    {
        $this->comments = $comments;
        parent::__construct();
    }

    public function html()
    {
        $this->builder->setScript('/js/comment.js');
        $this->builder->includeAdminSidebar();
        $this->builder->startPage();
        ?>
        <div class="row mt-3 mb-3">
            <div class="col-md-6">
                <h3>Approve comments</h3>
                <hr>
            </div>
        </div>
        <?php if(!empty($this->comments)) : ?>
        <div id="comments-holder">
        <?php foreach($this->comments as $comment) : ?>
        <div class="row">
            <div class="col-md-6">
                <table class="table table-striped table-bordered">
                    <tbody>
                    <tr>
                        <th>Author:</th>
                        <td><?= $comment['name']; ?></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><?= $comment['email']; ?></td>
                    </tr>
                    <tr>
                        <th>Body:</th>
                        <td><?= $comment['body']; ?></td>
                    </tr>
                    <tr>
                        <th colspan="2" class="text-center">
                            <button
                                    class="btn btn-sm btn-primary"
                                    onclick="approveComment(<?= $comment['id'] ?>)"
                            >
                                Approve comment
                            </button>
                        </th>
                    </tr>
                    </tbody>
                </table>
                <hr>
            </div>
        </div>
        <?php endforeach; ?>
        </div>
        <?php else : ?>
        <div class="row">
            <div class="col-md-6">
                No comments to be approved...
            </div>
        </div>
        <?php endif; ?>

        <?php
        $this->builder->endPage();
    }
}
