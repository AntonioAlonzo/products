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

        return $sellers;
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

        $seller->save();
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

        return $seller;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSeller $request, $id)
    {
        $seller = Seller::find($id);
        $seller->first_name = $request->first_name;
        $seller->last_name = $request->last_name;

        $seller->save();
    }

    /**
     * Update the specified resource in storage partially.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'sometimes|max:255',
            'last_name' => 'sometimes|max:255',
        ]);

        $seller = Seller::find($id);
        $seller->fill($request->all());
        $seller->save();
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
        $seller->sellerAddress()->first()->delete();
        $seller->delete();
    }
}
