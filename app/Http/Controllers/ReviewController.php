<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;
use App\Product;

use Session;
use Redirect;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($productId)
    {
        $reviews = Review::where('product_id', $productId)->get();

        return $reviews;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $productId)
    {
        $this->validate($request, [
            'reviewer_name' => 'required|max:255',
            'title' => 'required|max:255',
            'contents' => 'required|max:255',
            'date' => 'required|max:255',
        ]);

        $review = new Review();
        $review->reviewer_name = $request->reviewer_name;
        $review->title = $request->title;
        $review->content = $request->contents;
        $review->date = $request->date;
        $review->save();

        $product = Product::find($productId);
        $review->product()->associate($product);
        $review->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($reviewId)
    {
        $review = Review::find($reviewId);
        $review->delete();
    }
}