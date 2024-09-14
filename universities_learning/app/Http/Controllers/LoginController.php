<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Services\Messages;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $credentials = [
            'phone' => request('phone'),
            'password' => request('password')
        ];

        if (auth()->attempt($credentials)) {
            $data = auth()->user();

            $data['token'] = auth()->user()->createToken($data['phone'])->plainTextToken;

            return Messages::success(UserResource::make($data), 'Login successfully');
        } else {
            return Messages::error('Login failed');
        }
    }
}
