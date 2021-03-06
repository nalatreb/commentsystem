<?php namespace Wboyz\CommentSystem\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Comments Back-end Controller
 */
class Comments extends Controller
{
    public $requiredPermissions = ['wboyz.commentsystem.comments'];
    
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Wboyz.CommentSystem', 'commentsystem', 'comments');
    }
}