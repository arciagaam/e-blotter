<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class RecordsKpFormRequest extends FormRequest
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

        throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'lupon.*.required' => 'The lupon field is required',
            'lupon.*.regex' => 'The lupon field must only contain letters and spaces',
            'witness.*.required' => 'The witness field is required',
            'witness.*.regex' => 'The witness field must only contain letters and spaces',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            //KP FORM 1
            'members' => 'sometimes|required',

            //KP FORM 2
            'to' => 'sometimes|required',

            //KP FORM 5
            'name_of_lupon' => 'sometimes|required',
            'subscribed' => 'sometimes|required',

            //KP FORM 6
            'incapacity_to_discharge' => 'sometimes|required',

            // KP FORM 7
            'complain' => 'sometimes|required',
            'relief' => 'sometimes|required',

            //KP FORM 8, 9, 12, 18, 19, 26
            'hearing' => 'sometimes|required',

            //KP FORM 9
            'officer' => 'sometimes|required',

            //KP FORM 10
            'summon' => 'sometimes|required',

            //KP Form 11
            'lupon' => 'sometimes|required',
            'lupon.*' => 'sometimes|required|regex:/^[-a-zA-Z .]+$/',

            //KP FORM 13
            'witness' => 'sometimes|required',
            'witness.*' => 'sometimes|required|regex:/^[-a-zA-Z .]+$/',

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
