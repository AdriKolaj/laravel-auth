<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'author',
        'body'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

}
