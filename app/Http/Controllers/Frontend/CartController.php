<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function index()
    {
        if(auth()->check()){
            $carts = Cart::with(['product','product.file'])->whereUser_uuid(user()->uuid)->get();
            return view('frontend.cart', compact('carts'));
        }else{
            return redirect()->route('index');
        }
    }

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
    public function incrementStore(Request $request)
    {
        $increment = Cart::find($request->cart_id)->quantity + 1;
        try {
            Cart::find($request->cart_id)->update(['quantity' =>$increment]);
            return response()->json(['message'=> 'Incremented'], 200);
        } catch (\Exception $e) {
            // return response()->json(['message'=>__('app.oops')], 500);
            return response()->json(['message'=>$e->getMessage()], 500);
        }
    }
    public function decrementStore(Request $request)
    {
        $increment = Cart::find($request->cart_id)->quantity;
        if($increment == 1){
            return response()->json(['message'=> 'Minimum Quantity 1'], 200);
        }
        try {
            Cart::find($request->cart_id)->update(['quantity' => $increment - 1]);
            return response()->json(['message'=> 'Decremented'], 200);
        } catch (\Exception $e) {
            // return response()->json(['message'=>__('app.oops')], 500);
            return response()->json(['message'=>$e->getMessage()], 500);
        }
    }

    public function show()
    {
        $datum = Cart::with(['product','product.file'])->whereUser_uuid(user()->uuid)->get();
        $carts = view('frontend.layout.includes.cart', ['datum' => $datum])->render();
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

    public function delete($uuid)
    {
        try {
            Cart::find($uuid)->delete();
            Alert::success('Success','Cart deleted successfully');
            return back();
        } catch (\Exception $e) {
            return back();
            Alert::success('Success','Cart delete failed');
            return back();
            // return response()->json(['message'=>__('app.oops')], 500);
            // return response()->json(['message'=>$e->getMessage()], 500);
        }
    }
}
