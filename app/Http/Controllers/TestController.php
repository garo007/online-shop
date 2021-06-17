<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function addTest(Request $request){

        $input = $request->except('_token');
        $item = new Test;
        $item->create($input);


            return redirect()->route('indexPage')->with('success', 'Հաջողությամբ ավելացվել է');


    }
}
