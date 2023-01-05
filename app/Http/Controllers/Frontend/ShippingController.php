<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ShippingController extends Controller
{
    public function store(Request $request)
    {
        // Previous Session Delete
        $request->session()->forget('product_uuids');
        $request->session()->forget('product_uuid');
        $request->session()->forget('quantity');

        // Session Store
        $request->session()->put('product_uuid', $request->product_uuid);
        $request->session()->put('quantity', $request->quantity);
        return redirect()->route('frontend.shipping.index');
    }

    public function index(Request $request)
    {
        $product              = Product::whereUuid($request->session()->get('product_uuid'))->first();
        $priceWithoutDiscount = $product->price * $request->session()->get('quantity');
        $discount             = $request->session()->get('quantity') * ($product->price * $product->discount / 100);
        $priceWithDiscount    = $product->price - $product->price * $product->discount / 100;


        $totalPrice           = $priceWithoutDiscount * $request->session()->get('quantity');
        return view('frontend.shipping', compact('product','priceWithoutDiscount','priceWithDiscount','discount','totalPrice'));
    }

    public function confirm(Request $request)
    {
        $this->validate($request,[
            'product_uuid' => 'required',
            'pay_method'   => 'required',
        ]);
        $product = Product::whereUuid($request->product_uuid)->first();
        $priceWithoutDiscount = $product->price * $request->session()->get('quantity') - ($product->price * $product->discount / 100);
        $totalPrice = $priceWithoutDiscount * $request->quantity;

        try{
            Sale::create([
                'user_uuid'    => user()->uuid,
                'product_uuid' => $request->product_uuid,
                'pay_method'   => $request->pay_method,
                'quantity'     => $request->session()->get('quantity'),
                'price'        => $priceWithoutDiscount,
                'discount'     => $product->discount,
            ]);
            Alert::success('Success','Order Successfully Created');
            return redirect()->route('index');
        }catch(\Exception $e){
            return $e->getMessage();
            // return back();
        }
    }

    // Multiple shipping
    public function multipleStore(Request $request)
    {
        // Previous Session Delete
        $request->session()->forget('product_uuids');
        $request->session()->forget('product_uuid');
        $request->session()->forget('quantity');
        // Session Store
        $request->session()->put('product_uuids', $request->product_uuid);

        return redirect()->route('frontend.shipping.shippingMulti');
    }

    public function shippingMulti(Request $request)
    {
        $product_uuids        = $request->session()->get('product_uuids');
        $products             = Product::whereIn('uuid', $product_uuids)->get(['uuid', 'price', 'discount']);

        $priceWithoutDiscount = $discount = $priceWithDiscount = 0;
        foreach($products as $k => $v){
            $priceWithoutDiscount += $v->price - ($v->price * $v->discount / 100);
            $discount             += $v->price * $v->discount / 100;
            $priceWithDiscount    += $v->price;
        }

        return view('frontend.shipping_multi', compact('products','priceWithoutDiscount','discount','priceWithDiscount'));
    }


}
