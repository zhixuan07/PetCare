<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class reviewController extends Controller
{
    public function showReview($product_id)
    {
        $product_review = Review::where('product_id',$product_id)->get();
        return response()->json(["reviews"=>$product_review]);
    }
}
