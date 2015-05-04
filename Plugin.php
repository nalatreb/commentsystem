<?php namespace Wboyz\CommentSystem;

use System\Classes\PluginBase;
use Backend;

/**
 * CommentSystem Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Comment System',
            'description' => 'A vásárlói véleményezésekhez létrehozott plugin',
            'author'      => 'Wboyz',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerComponents()
    {
        return [
            'Wboyz\CommentSystem\Components\CommentComponent' => 'commentApp'
        ];
    }

    public function registerNavigation()
    {
        return [
            'comment' => [
                'label'       => 'wboyz.commentsystem::lang.comment.menu_label',
                'url'         => Backend::url('wboyz/commentsystem/comments'),
                'icon'        => 'icon-comments-o',
                'permissions' => ['wboyz.commentsystem.*'],
                'order'       => 500
            ]
        ];
    }
    
    public function registerPermissions()
    {
        return [
            'wboyz.commentsystem.*'    => ['label' => 'wboyz.commentsystem::lang.comment.menu_label']
        ];
    }

}
