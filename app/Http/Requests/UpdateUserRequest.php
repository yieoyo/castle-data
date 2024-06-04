<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the users is authorized to make this request.
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
        return [
            // Validation rule for the 'name' field: required, string, maximum length 250 characters.
            'name' => 'required|string|max:250',

            // Validation rule for the 'email' field: required, string, valid email format, maximum length 250 characters, and unique in the 'users' table.
            'email' => 'required|string|email:rfc,dns|max:250',
        ];

    }
}
