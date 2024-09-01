<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){

        return view('register');
    }

    public function registerPost(RegisterFormRequest $request){
        //dd($request->validated());
        //User::query()->create($request->validated());
        $data = $request->validated();
       // dd($data);
        $data['password'] = bcrypt($request->password);
        $data['type'] = 'client';
        //dd($data);
        // Create the user with the validated data
        User::create($data);

        return back()->with('success','Your registration was successful!');
    }
}
