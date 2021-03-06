<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['reviewer_name', 'title', 'content', 'date'];

    public function products()
    {
        return $this->belongsTo('App\Post');
    }
}
