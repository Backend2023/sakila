<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateAddressRequest extends FormRequest
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
     * @see https://laravel.com/docs/11.x/validation#available-validation-rules
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

        /*
            #parameters: array:7 [▼
      "_token" => "WmYivXiwY7FjACWfyUlWYRbIcLc6suUpCbs1Bvyl"
      "_method" => "PUT"
      "address" => "1031 Daugavpils Parkway"
      "address2" => "xxy"
      "city_id" => "63"
      "postal_code" => "59025"
      "phone" => "107137400143"
    ]
        */
    }
}
