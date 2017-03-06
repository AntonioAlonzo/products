<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerAddress extends Model
{
    protected $fillable = ['address', 'city', 'state', 'country', 'postal_code'];

    public function seller()
    {
        return $this->hasOne('App\Seller');
    }
}
