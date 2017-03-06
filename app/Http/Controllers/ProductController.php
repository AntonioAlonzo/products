<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Product;
use App\Label;

use Session;
use Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('labels')->get();

        return $products;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->seller_id = $request->seller_id;
        $product->save();

        foreach ($request->labels as $label) {
            $existingLabel = Label::where('name', $label)->first();

            if ($existingLabel) {
                $product->labels()->attach($existingLabel->id);
            } else {
                $newLabel = new Label;
                $newLabel->name = $label;
                $newLabel->save();

                $product->labels()->attach($newLabel->id);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::with('labels')->where('id', $id)->first();
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'price' => 'required|max:255',
            'description' => 'required|max:255',
            'seller_id' => 'required',
        ]);

        $product = Product::find($id);
        $product->fill($request->all());
        $product->save();
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
            'name' => 'sometimes|max:255',
            'price' => 'sometimes|max:255',
            'description' => 'sometimes|max:255',
            'seller_id' => 'sometimes',
        ]);

        $product = Product::find($id);
        $product->fill($request->all());
        $product->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->reviews()->delete();
        $product->delete();
    }
}
