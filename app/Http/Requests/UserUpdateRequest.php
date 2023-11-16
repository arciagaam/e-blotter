<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'captain_first_name' => 'required',
            'captain_last_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'sometimes',
            'confirm_password' => 'sometimes|required_if:password,!=,null|same:password',
            'email' => 'required|email|unique:users,email',
            'contact_number' => 'required|numeric|regex:/^9\d{9}$/',
            'name' => 'required',
            'logo' => 'required|image|max:3072|mimes:jpg,jpeg,png',
            'purok' => 'required'
        ];
    }
}
