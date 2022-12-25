<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $products = Product::with(['file'])->get();
        return view('frontend.index', compact('sliders','products'));
    }
}
