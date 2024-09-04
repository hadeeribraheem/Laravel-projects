<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login'); // Show the login view
    }

    public function save(LoginFormRequest $request)
    {
        $data = $request->validated(); // Validate the incoming request

        if (auth()->attempt($data)) {
            $user = auth()->user()->load('image');
            session(['user' => $user]);
            if ($user->type === 'admin') {
               //dd('login controller ');
                /*return view('admin.list_users', compact('user'));*/
                //$user=UserResource::make($data);
                return redirect()->route('dashboard.users');

            } else{
                return view('welcome', compact('user'));
            }
            //return redirect()->to('/');
            //return redirect()->back()->with('success','Login successfully');
        } else {
            // If authentication fails, redirect back with an error message
            return redirect()->back()->withErrors([
                'error' => 'Email or password is incorrect.'
            ]);
        }
    }
}
