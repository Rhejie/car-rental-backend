<?php

namespace App\Http\Requests;

use App\Rules\EmailBlockRule;
use App\Rules\EmailValidateRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email', new EmailValidateRule, new EmailBlockRule],
            'password' => 'required'
        ];
    }
}
