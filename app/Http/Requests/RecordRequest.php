<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use Illuminate\Validation\Rules\File;

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
            "victim.first_name" => 'required|string|max:255',
            "victim.middle_name" => 'nullable|string|max:255',
            "victim.last_name" => 'required|string|max:255',
            "victim.age" => 'required|numeric|gt:0',
            "victim.sex" => 'required|numeric',
            "victim.contact_number" => 'required|numeric|regex:/^9\d{9}$/',
            "victim.purok" => 'required|max:255',
            "victim.barangay" => 'required|max:255',
            "victim.municipality" => 'required|max:255',
            "victim.province" => 'required|max:255',
            "victim.civil_status_id" => 'required|numeric',
            "suspect.first_name" => 'nullable|string|max:255',
            "suspect.middle_name" => 'nullable|string|max:255',
            "suspect.last_name" => 'nullable|string|max:255',
            "suspect.sex" => 'required',
            "suspect.barangay" => 'required|max:255',
            "suspect.municipality" => 'required|max:255',
            "suspect.province" => 'required|max:255',
            "blotter_status_id" => 'sometimes|required',
            "case" => 'required',
            "narrative" => 'required',
            "narrative_file" => 'nullable',
            "reliefs" => 'nullable',
            "purok" => 'sometimes|required',
        ];
    }

    /**
     * Get the "after" validation callables for the request.
     */
    public function after(): array
    {
        return [
            function (Validator $validator) {
                $mimeTypes = collect(['audio/mpeg', 'audio/x-wav']);

                if (isset($validator->validated('narrative_file')['narrative_file']) && $mimeTypes->doesntContain($validator->validated('narrative_file')['narrative_file']->getClientMimeType())) {
                    $validator->errors()->add(
                        'narrative_file',
                        'The narrative file field must be a file of type: audio/mpeg, audio/x-wav'
                    );
                }
            }
        ];
    }
}
