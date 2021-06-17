<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::where('lang',app()->getLocale())->where('parent',0)->get();

        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'integer|min:0',
            'status' => 'in:gift,sale,barter',
            'description' => 'max:1000',
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if(Auth::check()){
            $product = $request->except('_token','image');
            $item = new Product;

            $prod = $item->create($product);
            $prod->update([
                'created_at' => time(),
                'updated_at' => time(),
            ]);
            $prod->users()->attach(Auth::id());
            $files = [];
            if($request->hasfile('image'))
            {
                foreach($request->image as $i => $file)
                {

                    $name[$i] = time().rand(1,100).'.'.$file->extension();
                    $file->move(public_path('images'), $name[$i]);

                    $files[$i]['img'] = $name[$i];
                    $files[$i]['product_id'] = $prod->id;
                }
            }
            $img_item = new ProductImage;
            $img_item->insert($files);

            /* Store $imageName name in DATABASE from HERE */

            return back()
                ->with('success','You have successfully added.');
        }else{
            $product = $request->except('_token','image');
            $item = new Product;


            /*$prod = $item->create($product);
            $prod->update([
                'created_at' => time(),
                'updated_at' => time(),
            ]);

            $prod->users()->attach(0);*/

            $files = [];

            if($request->hasfile('image'))
            {
                foreach($request->image as $i => $file)
                {
                    $name[$i] = time().rand(1,100).'.'.$file->extension();
                    $file->move(public_path('images'), $name[$i]);
                    $files[$i]['img'] = $name[$i];
                    //$files[$i]['product_id'] = $prod->id;
                }
            }else{
                $files['img'] = "no-image.png";
                //$files['product_id'] = $prod->id;
            }

            $product['images'] = $files;

            session()->put('add_product_no_login', $product);
            /*$img_item = new ProductImage;
            $img_item->insert($files);
            $request->session()->put('prod_id', $prod->id);*/
            return view('auth.reg_and_log');
            /*->with('error','skzbic petq e mutq linel');*/
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Product::findorfail($id);

        return view('product.edit')->with(['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
