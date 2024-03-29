<?php

namespace App\Http\Requests;

use App\Models\Barangay;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

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
        // $this->merge([
        //     "username" => str_replace(" ", "_", strtolower($this->name))
        // ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'captain_first_name' => 'required',
            'captain_last_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'email' => 'required|email|unique:users,email',
            'contact_number' => 'required|numeric|regex:/^9\d{9}$/',
            'name' => 'required|unique:barangays,name',
            'logo' => 'required|image|max:3072|mimes:jpg,jpeg,png',
            'purok' => 'required'
        ];
    }
}
