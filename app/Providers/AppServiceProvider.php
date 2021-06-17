<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Message;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {

        view()->composer('*', function ($view)
        {
            $messages = Message::where('incoming_id', auth()->id())->get();

            //...with this variable
            $view->with('messages', $messages);

        });




        $categorys = Category::with('product')->orderBy('id')->get();


        View::share([
            'categorys' => $categorys,
        ]);
    }
}
