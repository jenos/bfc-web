<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model
{
    protected $fillable = ['parent_id', 'name', 'description', 'priority'];
}
