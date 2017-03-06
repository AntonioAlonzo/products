<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Seller;
use App\SellerAddress;
use App\Http\Requests\StoreSeller;

use Session;
use Redirect;

class SellerAddressController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $sellerId)
    {
        $this->validate($request, [
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'country' => 'required|max:255',
            'postal_code' => 'required|max:255'
        ]);

        $seller_address = new SellerAddress();
        $seller_address->address = $request->address;
        $seller_address->city = $request->city;
        $seller_address->state = $request->state;
        $seller_address->country = $request->country;
        $seller_address->postal_code = $request->postal_code;
        $seller_address->save();

        $seller = Seller::find($sellerId);
        $seller->sellerAddress()->associate($seller_address);
        $seller->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sellerId)
    {
        $this->validate($request, [
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'country' => 'required|max:255',
            'postal_code' => 'required|max:255'
        ]);

        $seller_address = Seller::find($sellerId)->sellerAddress()->first();
        $seller_address->address = $request->address;
        $seller_address->city = $request->city;
        $seller_address->state = $request->state;
        $seller_address->country = $request->country;
        $seller_address->postal_code = $request->postal_code;
        $seller_address->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seller = Seller::find($id);
        $seller->delete();
    }
}