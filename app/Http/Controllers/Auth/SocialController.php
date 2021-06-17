<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\UserProducts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use mysql_xdevapi\Exception;

class SocialController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginWithGoogle()
    {

        try{


            $user = Socialite::driver('google')->stateless()->user();

            $isUser = User::where('google_id', $user->getId())->first();

            if($isUser){
                Auth::login($isUser);
            }else{
                $createUser = User::create([
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'google_id'=>$user->id,
                    'password'=>encrypt('user'),
			    ]);
                Auth::login($createUser);
		    }
            if(Session::get("prod_id")){
                $prod_id = Session::get("prod_id");

                $user_product = UserProducts::where('product_id', $prod_id)->first();;
                $user_product->update(['user_id'=>Auth::id()]);

                Session::flash('success_add_product', 'your product added');

            }
            return redirect('/personal');
        }catch (Exception $exception){
            dd($exception->getMessage());
        }
    }
}
