<?php namespace Wboyz\CommentSystem\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCommentsTable extends Migration
{

    public function up()
    {
        Schema::create('wboyz_commentsystem_comments', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wboyz_commentsystem_comments');
    }

}
