<?php

namespace App\Controllers;

use App\Model\Comment;
use App\Resources\JSON;
use App\Views\UnapprovedCommentsView;
require_once 'Controller.php';

class CommentsController extends Controller {

    public function __construct()
    {
        $this->model('Comment');
    }

    public function index()
    {
        $comment = new Comment();
        $this->view('UnapprovedCommentsView');
        $view = new UnapprovedCommentsView($comment->getBy(['approved = 0']));
        $view->html();
    }


    public function store()
    {
        $errors = [];

        if(empty($_POST['name'])) {
            $errors['name'] = 'Name can\'t be empty.';
        }

        if(empty($_POST['email'])) {
            $errors['email'] = 'Email can\'t be empty.';
        }

        if(empty($_POST['body'])) {
            $errors['body'] = 'Body can\'t be empty.';
        }

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please type in valid email address.';
        }

        try {

            if(!empty($errors)) {
                throw new \Exception(json_encode($errors));
            }
            $comment = new Comment();
            if(!$comment->create($_POST)) {
                throw new \Exception(json_encode(['error' => 'Error occured trying to create new comment. Please try again']));
            }

            JSON::response();

        } catch(\Exception $e) {
            JSON::response('error', json_decode($e->getMessage()), 422);
        }

    }

    public function update()
    {
        $comment = new Comment();

        try {
            if(!$comment->update( (integer) $_GET['id'], $_POST)) {
                throw new \Exception('Comment isn\'t updated. Please try later');
            }
        } catch(\Exception $e) {
            JSON::response('error', ['error' => $e->getMessage(), 500]);
        }

    }

}