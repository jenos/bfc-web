<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    protected $fillable = ['thread_id', 'author_id', 'editor_id', 'content'];
}
