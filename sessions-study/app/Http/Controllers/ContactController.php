<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        //return request()->path();
        //return request()->url();
        //return request()->fullUrl();
        //return request()->host();
        //if(request()->filled('name')){
        //if(request()->hasHeader('name')){
        //  echo '123';
        //}
        return view('contact');
    }
    public function save(ContactFormRequest $request){
        //return request()->except(['username']);
        //return request()->only(['username','title','message']);
        //return request()->all();
        //return request()->input('username');
        //return request('username');
        //'email' => 'required|email|unique:contacts',
        dd($request->validated());
        Contact::query()->create($request->validated());
        //return redirect()->back()->with('success', 'Your message has been sent');
    }
}
