<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class WishlistController extends Controller
{
    public function index()
    {
        if(auth()->check()){
            $carts = Wishlist::with(['product','product.file'])->whereUser_uuid(user()->uuid)->get();
            return view('frontend.cart', compact('carts'));
        }else{
            return redirect()->route('index');
        }
    }

    public function store(Request $request)
    {
        try {
            Wishlist::updateOrCreate(
                [
                    'product_uuid' => $request->product_id,
                    'user_uuid' => user()->uuid],
                [
                    'product_uuid' => $request->product_id,
                    'user_uuid' => user()->uuid,
                    // 'quantity' => 1,
                ]);
            return response()->json(['message'=> 'Added to add to wishlist'], 200);
        } catch (\Exception $e) {
            // return response()->json(['message'=>__('app.oops')], 500);
            return response()->json(['message'=>$e->getMessage()], 500);
        }
    }

    public function show()
    {
        $wishlists = Wishlist::with(['product','product.file'])->whereUser_uuid(user()->uuid)->get();
        $wishlist = view('frontend.layout.includes.wishlist', ['wishlists' => $wishlists])->render();
        return response()->json(['status' => 'success', 'html' => $wishlist, 'wishlist']);
    }

    public function destroy(Request $request)
    {
        try {
            Wishlist::find($request->uuid)->delete();
            return response()->json(['message'=> 'Remove from add to wishlist'], 200);
        } catch (\Exception $e) {
            // return response()->json(['message'=>__('app.oops')], 500);
            return response()->json(['message'=>$e->getMessage()], 500);
        }
    }

    public function delete($uuid)
    {
        try {
            Wishlist::find($uuid)->delete();
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

