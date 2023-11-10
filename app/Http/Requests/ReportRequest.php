<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            "from" => "required",
            "to" => "required",
            "addressee_to" => "required",
            "addressee_company" => "required",
            "addressee_address" => "required",
            // "order" => "required",
            "contents" => "required|array",
            "blotter_status" => "required|array",
        ];
    }
}
