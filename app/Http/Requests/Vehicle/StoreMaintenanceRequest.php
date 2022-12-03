<?php

namespace App\Http\Requests\Vehicle;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaintenanceRequest extends FormRequest
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
            'vehicle' => ['required'],
            'Date' => ['required', 'date'],
            // 'estimated_return' => ['required'],
            'price' => ['required'],
            'type_of_maintenance' => ['required', 'string']
        ];
    }
}
