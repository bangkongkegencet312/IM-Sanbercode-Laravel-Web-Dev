<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class dashboard_controller extends Controller
{
   public function login(){
      return view('auth.authentication-login');
   }


   public function home(){
    return view('welcome');
   } 
   
   public function create()
   {
      return view('auth.authentication-register');
   }
      //
}
