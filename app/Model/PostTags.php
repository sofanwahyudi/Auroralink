<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostTags extends Model
{
    protected $fillable = array('post_id','tags_id');
}
