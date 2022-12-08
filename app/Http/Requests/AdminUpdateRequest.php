<?php

namespace App\Http\Requests;

use App\Rules\NewPasswordRule;
use App\Rules\OldPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'contact_number' => 'required|string',
            'email' => ['required', 'string', 'email', 'unique:users,email,'. $this->id.',id'],
            'old_password' => ['exclude_unless:change_password,true', 'required', new OldPasswordRule],
            'new_password' => ['exclude_unless:change_password,true','required','confirmed', new NewPasswordRule],
        ];
    }
}
