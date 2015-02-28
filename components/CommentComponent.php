<?php namespace Wboyz\CommentSystem\Components;

use Cms\Classes\ComponentBase;
use Wboyz\CommentSystem\Models\Comment;
use Session;
use DB;

class CommentComponent extends ComponentBase
{
    public $comments;
    public $operation;
    public $error_msg;

    public function componentDetails()
    {
        return [
            'name' => 'Comment Plugin',
            'description' => 'Kommentkezelő rendszer.'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->addCss('/plugins/wboyz/commentsystem/assets/css/comment.css');
        $this->error_msg = false;
        $this->operation = $this->generateCaptcha();
        $this->comments = DB::table('wboyz_commentsystem_comments')
            ->where('is_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function onAddComment()
    {
        $this->page['error_msg'] = 'Kérjük töltsön ki minden mezőt!';
        $captcha = Session::get('commentCaptcha');
        if (post('captcha') != $captcha) {
            $this->page['error_msg'] = 'Helytelen ellenőrző kód!';
        }
        if (post('name') && post('email') && post('comment') && post('captcha') == $captcha) {
            $comment = new Comment();
            $comment->name = post('name');
            $comment->email = post('email');
            $comment->comment = post('comment');
            $comment->is_active = 1;
            $comment->save();
            $this->page['error_msg'] = false;
        }

        $this->page['operation'] = $this->generateCaptcha();
        $this->page['comments'] = DB::table('wboyz_commentsystem_comments')
            ->where('is_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    private function generateCaptcha()
    {
        $operands = array('+', '*');
        $var1 = rand(1, 10);
        $op = $operands[rand(0, 1)];
        $var2 = rand(1, 10);
        $operation = $var1 . ' ' . $op . ' ' . $var2;
        $result = $op ? $var1 * $var2 : $var1 + $var2;
        Session::put('commentCaptcha', $result);
        return $operation;
    }
}