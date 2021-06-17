<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use App\Models\UserProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show($cat, $product_id){
        $item = Product::with('users')->where('id', $product_id)->first();
        return view('product.show',compact('item'));
    }
    public function showCategory(Request $request, $cat_id){
        $cat = Category::where('id', $cat_id)->first();

        $paginate = 10;
        $products = Product::where('category_id', $cat->id)->paginate($paginate);
        if(isset($request->orderBy)){
            if($request->orderBy=="price-low-high"){
                $products = Product::where('category_id', $cat->id)->orderBy('price')->paginate($paginate);
            }
            if($request->orderBy=="price-high-low"){
                $products = Product::where('category_id', $cat->id)->orderBy('price', 'desc')->paginate($paginate);
            }
            if($request->orderBy=="name-a-z"){
                $products = Product::where('category_id', $cat->id)->orderBy('name')->paginate($paginate);
            }
            if($request->orderBy=="name-z-a"){
                $products = Product::where('category_id', $cat->id)->orderBy('name', 'desc')->paginate($paginate);
            }
        }
        if($request->ajax()){
            return view('ajax.order-by',[
                'products' =>$products
            ])->render();
        }
        return view('categorys.index', compact('cat','products'));
    }
}
