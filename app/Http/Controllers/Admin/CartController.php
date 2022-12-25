<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function store(Request $request)
    {
        try {
            Cart::updateOrCreate(
                [
                    'product_uuid' => $request->product_id,
                    'user_uuid' => user()->uuid],
                [
                    'product_uuid' => $request->product_id,
                    'user_uuid' => user()->uuid,
                    'quantity' => 1,
                ]);
            return response()->json(['message'=> 'Added to add to cart'], 200);
        } catch (\Exception $e) {
            // return response()->json(['message'=>__('app.oops')], 500);
            return response()->json(['message'=>$e->getMessage()], 500);
        }
    }

    public function show()
    {
        $inputs = Cart::with(['product','product.file'])->whereUser_uuid(user()->uuid)->get();
        $carts = view('frontend.layout.includes.cart', ['inputs' => $inputs])->render();
        return response()->json(['status' => 'success', 'html' => $carts, 'carts']);
    }

    public function destroy(Request $request)
    {
        try {
            Cart::find($request->uuid)->delete();
            return response()->json(['message'=> 'Remove from add to cart'], 200);
        } catch (\Exception $e) {
            // return response()->json(['message'=>__('app.oops')], 500);
            return response()->json(['message'=>$e->getMessage()], 500);
        }
    }
}
