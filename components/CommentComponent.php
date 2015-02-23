<?php namespace Wboyz\CommentSystem\Components;

use Cms\Classes\ComponentBase;
use Wboyz\CommentSystem\Models\Comment;

class CommentComponent extends ComponentBase
{
    public $comments;

    public function componentDetails()
    {
        return [
            'name'        => 'Comment Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->page['error_msg'] = false;
        $this->comments = Comment::all();
    }

    public function onAddComment()
    {
        if (!post('name') || post('email') || post('comment')) {
            $this->page['error_msg'] = 'Kérjük töltsön ki minden mezőt!';
            $this->page['comments'] = Comment::all();
            return;
        }
        $comment = new Comment();
        $comment->name = post('name');
        $comment->email = post('email');
        $comment->comment = post('comment');
        $comment->save();

        $this->page['error_msg'] = false;
        $this->page['comments'] = Comment::all();
    }

}