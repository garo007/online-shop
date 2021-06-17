<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use App\Models\UserProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request  $request)
    {

        $user = User::with('products')->where('id',Auth::id())->first();
        if(Session::get("add_product_no_login")){

            $prod = collect(Session::get("add_product_no_login"));

            $product_session = $prod->except('images');
            $arrays[] = $product_session->toArray();
            $item = new Product;
            $product = $item->create($arrays[0]);

            $images[] = $prod->only('images');

            $files = [];

            foreach($images[0]['images'] as $i => $file)
                {
                    $files[$i]['img'] = $images[0]['images'][$i]['img'];
                    $files[$i]['product_id'] = $product->id;
                }
            //dd($files);
            $img_item = new ProductImage();
            $img_item->insert($files);
            //dd(1);

            $product->users()->attach(Auth::id());

            /*$prod_id = Session::get("prod_id");
            $item = Product::where('id', $prod_id)->first();

            $user_product = UserProducts::where('product_id', $prod_id)->first();;
            $user_product->update(['user_id'=>Auth::id()]);*/


            Session::flash('success_add_product', 'your product added');

            //return redirect('personal/')->with('user', $user);
        }
        return redirect('personal/')->with('user', $user);
    }
}
