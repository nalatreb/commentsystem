<?php namespace Wboyz\CommentSystem\Models;

use Model;

/**
 * Comment Model
 */
class Comment extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'wboyz_commentsystem_comments';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}