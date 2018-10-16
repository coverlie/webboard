<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
