<?php

namespace App\Http\Controllers\Auth;

use App\Actions\ImageModalSave;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveUserInfoFormRequest;
use App\Services\Users\SaveUserInfoService;
use App\traits\upload_image;

class RegisterController extends Controller
{
    use upload_image;
    public function index(){
        //return auth()->id();
        return view('auth.register');
    }
    public function save(SaveUserInfoFormRequest $request){
        $data = $request->validated();
        $data['type'] = 'client';
        $file = request()->file('image');
        if($file = null){
            $image_name = 'default.png';
        }
        else{
            $image_name = $this->upload($file,'users');
        }
        $user  = SaveUserInfoService::save($data);
        ImageModalSave::make($user->id,'User',$image_name);
        return redirect()->back()->with('success','User Created Successfully');

    }

}
