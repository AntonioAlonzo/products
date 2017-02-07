<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = ['first_name', 'last_name'];

    public function address()
    {
        return $this->hasOne('App\SellerAddress', 'foreign_key');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
