<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumThread extends Model
{
    protected $fillable = ['forum_id', 'author_id', 'name', 'locked', 'pinned'];
}
