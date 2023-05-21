<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecordRequest extends FormRequest
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
            "victim.name" => 'required|string',
            "victim.age" => 'required|numeric',
            "victim.sex" => 'required|numeric',
            "victim.contact_number" => 'required|numeric',
            "victim.address" => 'required',
            "victim.civil_status_id" => 'required|numeric',
            "suspect.name" => 'required',
            "suspect.sex" => 'required',
            "suspect.address" => 'required',
            "case" => 'required',
            "narrative" => 'required',
            "reliefs" => 'required',
        ];
    }
}
