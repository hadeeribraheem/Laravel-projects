<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function welcome()
    {
        $user = Auth::user(); // Get the currently authenticated user
        return view('welcome', compact('user')); // Pass the $user variable to the view
    }
   public function index(){
       return view('about');
   }
}
