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
            "victim.name" => 'required|string',
            "victim.age" => 'required|numeric',
            "victim.sex" => 'required|numeric',
            "victim.contact_number" => 'required|numeric',
            "victim.address" => 'required',
            "victim.civil_status_id" => 'required|numeric',
            "suspect.name" => 'required',
            "suspect.sex" => 'required',
            "suspect.address" => 'required',
            "blotter_status_id" => 'sometimes|required',
            "purok" => 'required',
            "case" => 'required',
            "narrative" => 'required',
            "narrative_file" => 'nullable',
            "reliefs" => 'required',
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

                if ($mimeTypes->doesntContain($validator->validated('narrative_file')['narrative_file']->getClientMimeType())) {
                    $validator->errors()->add(
                        'narrative_file',
                        'The narrative file field must be a file of type: audio/mpeg, audio/x-wav'
                    );
                }
            }
        ];
    }
}
