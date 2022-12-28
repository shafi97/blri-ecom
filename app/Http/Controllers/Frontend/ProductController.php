<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function productByCat($uuid)
    {
        $products = Product::with(['file'])->whereCategory_uuid($uuid)->get();
        return view('frontend.product_by_cat', compact('products'));
    }

    public function productBySubCat($uuid)
    {
        $products = Product::with(['file'])->whereSub_category_uuid($uuid)->get();
        return view('frontend.product_by_cat', compact('products'));
    }

    public function show($uuid)
    {
        // return user()->district_id;
        $product = Product::with(['file'])->whereUuid($uuid)->first();

        auth()->check() ?
        $cart = Cart::whereUser_uuid(user()->uuid)->whereProduct_uuid($uuid)->first() :
        $cart = 1;


        return view('frontend.product_show', compact('product','cart'));
    }
}
