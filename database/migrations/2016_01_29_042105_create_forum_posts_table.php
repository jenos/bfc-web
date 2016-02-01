<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('thread_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->integer('editor_id')->unsigned()->nullable();
            $table->longText('content');
            $table->timestamps();
            
            $table->foreign('thread_id')->references('id')->on('forum_threads')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('editor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('forum_posts');
    }
}
