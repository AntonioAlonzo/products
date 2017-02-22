<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Seller;
use App\SellerAddress;
use App\Http\Requests\StoreSeller;

use Session;
use Redirect;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::all();

        return View::make('sellers.index')
        ->with('sellers', $sellers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('sellers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSeller $request)
    {
        $seller = new Seller;
        $seller->first_name = $request->first_name;
        $seller->last_name = $request->last_name;

        $seller_address = new SellerAddress;
        $seller_address->address = $request->address;
        $seller_address->city = $request->city;
        $seller_address->state = $request->state;
        $seller_address->country = $request->country;
        $seller_address->postal_code = $request->postal_code;

        $seller_address->save();
        $seller->seller_address_id = $seller_address->id;

        $seller->save();

        Session::flash('message', 'Succesfully created seller!');

        return Redirect::to('sellers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seller = Seller::find($id); 

        return View::make('sellers.show')
        ->with('seller', $seller);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seller = Seller::find($id);

        return View::make('sellers.edit')
        ->with('seller', $seller);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

        Session::flash('message', 'Succesfully deleted seller!');

        return Redirect::to('sellers');
    }
}
