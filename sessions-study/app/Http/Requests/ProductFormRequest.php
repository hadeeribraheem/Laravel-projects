<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function my_rules()
    {
        $arr = [
            'name' => 'required',
            'info' => 'required',
            'price' => 'required',
            'quantity' => 'required|integer|min:1', // Validate quantity input
        ];

        // Check if the current request URI is for creating a new product
        if ($this->getRequestUri() == '/products') {
            $arr['images'] = 'required|array'; // Ensure 'images' is an array of files
            $arr['images.*'] = 'required|mimes:jpeg,jpg,png,gif|max:2048'; // Each image should be a valid image type and not exceed 2MB

        }

        return $arr;
    }
    public function rules(): array
    {
        return $this->my_rules();
    }
}
