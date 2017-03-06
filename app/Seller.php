<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = ['first_name', 'last_name'];

    public function sellerAddress()
    {
        return $this->belongsTo('App\SellerAddress');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
