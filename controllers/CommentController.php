<?php
include_once '../models/Comment.php';
class CommentController
{
    private Comment $commentModel;

    public function __construct()
    {
        $this->commentModel = new Comment();
    }

    public function index()
    {
        return $this->commentModel->getComments();
    }

    public function createComment($comment,$userid)
    {
        return $this->commentModel->createComment($comment,$userid);
    }
}