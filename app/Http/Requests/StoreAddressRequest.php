<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;  // koristi autoriziranog usera
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'address' => 'required|string|max:50',
            'address2' => 'string|max:50',
            'city_id' => 'required|integer|max_digits:5',
            'postal_code' => 'string|max:10',            
            'phone' => 'required|string|max:20',
        ];
    }
}
