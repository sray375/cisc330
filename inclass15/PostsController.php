<?php

require_once 'Post.php';

class PostsController {
    public function index() {
        $postModel = new Post();
        $posts = $postModel->getPosts();
        header('Content-Type: application/json');
        echo json_encode($posts);
    }
}
