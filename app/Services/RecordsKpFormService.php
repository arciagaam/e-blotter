<?php

namespace App\Services;

use App\Models\IssuedKpForm;
use App\Models\IssuedKpFormField;
use Illuminate\Database\Eloquent\Model;

class RecordsKpFormService {

    public function checkLatestKpForm(string $record_id)
    {
        return IssuedKpForm::getLatest($record_id)->first();
    }

    // Can only be used on single tagId
    public function handleKpFormUpdate($model, $request, $kpFormId, $tagId)
    {
        $issuedKpFormFields = IssuedKpFormField::where('issued_kp_form_id', $model->id)->where('tag_id', $tagId)->select('tag_id', 'value')->get()->map(function ($row) {
            return $row->value;
        });

        $requestKpFormFields = collect($request[$tagId]);

        $updates = array(
            'remove' => $issuedKpFormFields->diff($requestKpFormFields),
            'insert' => $requestKpFormFields->diff($issuedKpFormFields)
        );
        
        if (count($updates['remove'])) {
            IssuedKpFormField::where('issued_kp_form_id', $model->id)->where('tag_id', $tagId)->whereIn('value', $updates['remove'])->delete();
        }

        if (count($updates['insert'])) {
            $inserts = array();

            foreach ($updates['insert'] as $value) {
                array_push($inserts, [
                    'issued_kp_form_id' => $kpFormId,
                    'tag_id' => $tagId,
                    'value' => $value
                ]);
            }

            IssuedKpFormField::insert($inserts);
        }

        $nonTagIdRequests = collect($request)->except($tagId);

        if (count($nonTagIdRequests)) {
            foreach ($nonTagIdRequests as $key => $value) {
                IssuedKpFormField::where('issued_kp_form_id', $kpFormId)->where('tag_id', $key)->update(['value' => $value]);
            }
        }
    }
}
