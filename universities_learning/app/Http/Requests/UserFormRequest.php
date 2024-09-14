<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //app()->setLocale('ar');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required',
            'email' => 'required|unique:users,id|email',
            'phone' => 'required',
            'password' => 'filled', // pass
            'type' => 'required',
        ];
    }
    public function attributes()
    {
        // Handle different API versions or endpoints
        if (Str::contains(request()->getRequestUri(), 'login')) {
            return [
                'phone' => 'required',
                'password' => 'required',
            ];
        }

        return [
            'username' => __('keywords.username'),
            'email' => __('keywords.email'),
            'password' => __('keywords.password'),
            'phone' => __('keywords.phone'),
            'type' => __('keywords.type'),
        ];
    }
    public function messages()
    {
        return [
            'username.required' => __('keywords.error_msg'),
        ];
    }
}
