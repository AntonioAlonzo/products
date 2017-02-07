<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerAddress extends Model
{
    public $table = 'seller_addresses';

    protected $fillable = ['address', 'city', 'state', 'country', 'postal_code'];

    public function seller()
    {
        return $this->belongsTo('App\Seller');
    }
}
