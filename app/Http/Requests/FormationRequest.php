<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'promotion' => ' required | string  ',
            'name' => 'required | string ',
            'td' => 'nullable | string',
            'tp' => 'nullable | string',
            'option' => 'nullable | string',
            'category' => 'nullable | string',
            'students.*' => 'integer |exists:students,id',
        ];
    }
}
