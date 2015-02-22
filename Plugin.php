<?php namespace Wboyz\CommentSystem;

use System\Classes\PluginBase;

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
            'name'        => 'CommentSystem',
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

    /*
    public function registerNavigation()
    {
        return [
            'blog' => [
                'label'       => 'Blog',
                'url'         => Backend::url('acme/blog/posts'),
                'icon'        => 'icon-pencil',
                'permissions' => ['acme.blog.*'],
                'order'       => 500,

                'sideMenu' => [
                    'posts' => [
                        'label'       => 'Posts',
                        'icon'        => 'icon-copy',
                        'url'         => Backend::url('acme/blog/posts'),
                        'permissions' => ['acme.blog.access_posts'],
                    ],
                    'categories' => [
                        'label'       => 'Categories',
                        'icon'        => 'icon-copy',
                        'url'         => Backend::url('acme/blog/categories'),
                        'permissions' => ['acme.blog.access_categories']
                    ],
                ]

            ]
        ];
    }
    */

}
