<?php

namespace App\Http\Requests;

use App\Actions\HandleRulesValidation;
use Illuminate\Foundation\Http\FormRequest;

class YearsRequest extends FormRequest
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
    public function rules(): array
    {
        $arr_lang = ['name:required', 'info:nullable'];

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
