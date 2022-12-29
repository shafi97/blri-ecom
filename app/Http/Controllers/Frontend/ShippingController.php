<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShippingController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::whereUuid($request->session()->get('product_uuid'))->first();
        $priceWithoutDiscount = $product->price - $product->price * $product->discount / 100;
        $totalPrice = $priceWithoutDiscount * $request->session()->get('quantity');
        return view('frontend.shipping', compact('product','priceWithoutDiscount','totalPrice'));
    }

    public function store(Request $request)
    {
        // Previous Session Delete
        $request->session()->forget('product_uuid');
        $request->session()->forget('quantity');
        // Session Store
        $request->session()->put('product_uuid', $request->product_uuid);
        $request->session()->put('quantity', $request->quantity);
        return redirect()->route('frontend.shipping.index');
    }

    public function confirm(Request $request)
    {
        $product = Product::whereUuid($request->product_uuid)->first();
        $priceWithoutDiscount = $product->price - $product->price * $product->discount / 100;
        $totalPrice = $priceWithoutDiscount * $request->quantity;

        Sale::create([
            'user_uuid'    => user()->user_uuid,
            'product_uuid' => $request->product_uuid,
            'pay_method'   => $request->pay_method,
            'quantity'     => $request->quantity,
            'price'        => $totalPrice,
            'discount'     => $product->discount,
        ]);
        // return redirect()->route('frontend.shipping.index');
    }


}
