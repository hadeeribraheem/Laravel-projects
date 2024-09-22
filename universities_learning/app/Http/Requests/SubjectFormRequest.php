<?php

namespace App\Http\Requests;

use App\Actions\HandleRulesValidation;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class SubjectFormRequest extends FormRequest
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
        $arr = [
            'user_id' => 'required|exists:users,id',
            'yearid' => 'required|exists:colleagues_years,id',
        ];

        $arr_lang = [
            'name:required',
            'info:nullable',
        ];

        $this->validateUserType();
        return HandleRulesValidation::handle($arr, $arr_lang);
    }
    public function validateUserType()
    {
        if (request()->filled('user_id')) {
            $user = User::find(request('user_id'));
            if ($user && $user->type != 'doctor') {
                abort(500, 'User type is not correct');
            }
        } else {
            abort(400, 'User ID is missing');
        }
    }
}
