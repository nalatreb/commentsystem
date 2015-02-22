<?php namespace Wboyz\CommentSystem\Components;

use Cms\Classes\ComponentBase;
use Wboyz\CommentSystem\Models\Comment;

class CommentComponent extends ComponentBase
{
    public $comments;

    public function componentDetails()
    {
        return [
            'name'        => 'CommentComponent Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->comments = Comment::all();
    }

    public function onAddComment()
    {
        $comment = new Comment();
        $comment->name = post('name');
        $comment->email = post('email');
        $comment->comment = post('comment');
        $comment->save();

        $this->page['comments'] = Comment::all();
    }

}