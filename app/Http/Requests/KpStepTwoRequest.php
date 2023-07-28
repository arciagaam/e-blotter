<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

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
     * @override
     *
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator): void
    {
        session()->flash('alert', ['title' => 'Error', 'description' => $validator->errors()->first(array_keys($validator->errors()->messages())[0]) ?? 'Unkown error.', 'type' => 'danger']);
        // session()->flash('error', $validator->errors()->first(array_keys($validator->errors()->messages())[0]) ?? 'Unkown error.');

        throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
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

            //KP FORM 8, 9, 18, 19, 26
            'hearing' => 'sometimes|required',

            //KP FORM 9
            'officer' => 'sometimes|required',

            //KP FORM 10
            'summon' => 'sometimes|required',

            //KP Form 11
            

            //KP FORM 13
            'witness_1' => 'sometimes|required',
            'witness_2' => 'sometimes|nullable',
            'witness_3' => 'sometimes|nullable',
            'witness_4' => 'sometimes|nullable',

            //KP FORM 15
            'arbitration_award' => 'sometimes|required',

            //KP FORM 16
            'settlement' => 'sometimes|required',

            //KP FORM 17
            'fraud' => 'sometimes|required_without_all:violence,intimidation',
            'violence' => 'sometimes|required_without_all:fraud,intimidation',
            'intimidation' => 'sometimes|required_without_all:fraud,violence',
        ];
    }
}
