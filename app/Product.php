<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'description'];

    public function labels()
    {
        return $this->belongsToMany('App\Label')->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function sellers()
    {
        return $this->belongsTo('App\Seller');
    }
}
