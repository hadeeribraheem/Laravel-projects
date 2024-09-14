<?php

namespace App\Http\Requests;

use App\Actions\HandleRulesValidation;
use Illuminate\Foundation\Http\FormRequest;

class GovernmentFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check()&&auth()->user()->type=='admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Basic validation rules for 'status' and 'price'
      /*  $arr = [
            'status' => 'required',
            'price' => 'required'
        ];*/

        // Fields requiring validation across languages
        $arr_lang = ['name:required', 'info:nullable'];

        // Combine the basic rules with language-specific validation
        return HandleRulesValidation::handle([], $arr_lang);
    }
    public function attributes(): array
    {
        // Define the field attributes for better error messages or labels
        return [
            'ar_name' => __('keywords.ar_name'),
            'en_name' => __('keywords.en_name'),
            'ar_info' => __('keywords.ar_info'),
            'en_info' => __('keywords.en_info'),
        ];
    }
}
