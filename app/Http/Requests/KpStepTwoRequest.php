<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KpStepTwoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            // KP FORM 7
            'complain' => 'sometimes|required',
            'relief' => 'sometimes|required',

            //KP FORM 8, 9, 18, 19
            'hearing' => 'sometimes|required',

            //KP FORM 9
            'officer' => 'sometimes|required',

            //KP FORM 16
            'settlement' => 'sometimes|required',
        ];
    }
}
