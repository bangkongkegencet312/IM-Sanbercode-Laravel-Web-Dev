<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class form_controller extends Controller
{
    public function daftar (){
        return view('login');

    }
    public function welcome (Request $request) {
        // return $request->all();
        $fname = $request->input('first_name');
        $lname = $request->input('last_name');

        return view('home', ["fname" => $fname, "lname" => $lname]);

    }
    //
}
