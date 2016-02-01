<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'priority'];
}
