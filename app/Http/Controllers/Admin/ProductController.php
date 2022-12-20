<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($error = $this->authorize('product-manage')) {
            return $error;
        }
        if ($request->ajax()) {
            user()->role == 1 ? $products = Product::with(['category','subCategory'])->orderBy('name') :
            $products = Product::whereUser_uuid(user()->uuid)->orderBy('name');
            return DataTables::of($products)
                ->addIndexColumn()
                ->addColumn('category_name', function ($row) {
                    return $row->category->name;
                })
                ->addColumn('sub_category_name', function ($row) {
                    return $row->category->name;
                })
                ->addColumn('age', function ($row) {
                    return ageWithDays($row->d_o_b);
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })
                ->addColumn('action', function ($row) {
                    $btn = '';
                    if (userCan('product-edit')) {
                        $btn .= view('button', ['type' => 'ajax-edit', 'route' => route('admin.product.edit', $row->uuid) , 'row' => $row]);
                    }
                    if (userCan('product-delete')) {
                        $btn .= view('button', ['type' => 'ajax-delete', 'route' => route('admin.product.destroy', $row->uuid), 'row' => $row, 'src' => 'dt']);
                    }
                    return $btn;
                })
                ->rawColumns(['category_name','sub_category_name','age','action', 'created_at'])
                ->make(true);
        }
        if(user()->role == 1){
            $categories = Category::orderBy('name')->get(['uuid','name']);
        }else{
            $categories = Category::whereUser_uuid(user()->uuid)->orderBy('name')->get(['uuid','name']);
        }
        return view('dashboard.product.index', compact('categories'));
    }

    public function getSubCategory(Request $request)
    {
        $inputs = SubCategory::whereCategory_uuid($request->category_uuid)->get(['uuid','name']);
        $sub_categories = view('dashboard.product.get_sub_category', ['inputs' => $inputs])->render();
        return response()->json(['status' => 'success', 'html' => $sub_categories, 'sub_categories']);
    }

    public function store(Request $request, ProductStoreRequest $productStoreRequest)
    {
        if ($error = $this->authorize('product-add')) {
            return $error;
        }
        $data = $productStoreRequest->validated();
        $data['user_uuid'] = user()->uuid;
        $data['type'] = 1;
        $data['tran_id'] = transaction_id("INS");// In stock
        $data['weight'] = $request->weight.' '.$request->weight_unit;

        try {
            Product::create($data);
            return response()->json(['message'=> __('app.success-message')], 200);
        } catch (\Exception $e) {
            // return response()->json(['message'=>__('app.oops')], 500);
            return response()->json(['message'=>$e->getMessage()], 500);
        }
    }

    public function edit(Request $request, SubCategory $sub_category)
    {
        if ($error = $this->authorize('category-edit')) {
            return $error;
        }
        if ($request->ajax()) {
            $modal = view('dashboard.sub_category.edit')->with(['sub_category' => $sub_category])->render();
            return response()->json(['modal' => $modal], 200);
        }
        return abort(500);
    }
    public function update(Request $request, Category $category)
    {
        if ($error = $this->authorize('category-add')) {
            return $error;
        }
        $data = $request->validate([
            'name' =>'required|string|max:191',
        ]);
        try {
            $category->update($data);
            return response()->json(['message'=> 'Data Successfully Inserted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message'=>__('app.oops')], 500);
            // return response()->json(['message'=>$e->getMessage()], 500);
        }
    }

    public function destroy(Category $category)
    {
        if ($error = $this->authorize('category-delete')) {
            return $error;
        }
        try {
            $category->delete();
            return response()->json(['message'=> __('app.success-message')], 200);
        } catch (\Exception $e) {
            return response()->json(['message'=> __('app.oops')], 500);
            // return response()->json(['message'=>$e->getMessage()], 500);
        }
    }
}
