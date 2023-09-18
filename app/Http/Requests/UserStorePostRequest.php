<?php

namespace App\Http\Requests;

use App\Models\Barangay;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use Mockery\Undefined;

class UserStorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() == false;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            "username" => str_replace(" ", "_", strtolower($this->name))
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'email' => 'required|email|unique:users,email',
            'contact_number' => 'required',
            'name' => 'required',
            'logo' => 'required|image|max:3072|mimes:jpg,jpeg,png', // Make this required later
        ];
    }

    /**
     * Get the "after" validation callables for the request.
     */
    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($validator->errors()->messages('username')) {
                    $validator->errors()->add(
                        'invalid',
                        'Barangay already exists.'
                    );
                }

                $barangay = Barangay::where('name', $validator->safe()->only(['name']))->getExisting()->first();

                if ($barangay && count($barangay->users)) {
                    $validator->errors()->add(
                        'invalid',
                        'Barangay already exists.'
                    );
                }
            }
        ];
    }
}
