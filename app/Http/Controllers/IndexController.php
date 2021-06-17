<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Test;
use App\Models\User;
use App\Models\UserProducts;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::with(['images','category'])->orderBy('created_at')->take(25)->get();
       // $products = User::with('products')->get();
        return view('home.index',compact('products'));
    }
}
