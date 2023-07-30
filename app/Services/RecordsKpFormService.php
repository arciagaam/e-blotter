<?php

namespace App\Services;

use App\Models\IssuedKpForm;
use App\Models\IssuedKpFormField;
use Illuminate\Database\Eloquent\Model;

class RecordsKpFormService
{

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
            'remove' => $issuedKpFormFields->isNotEmpty() ? $issuedKpFormFields->diff($requestKpFormFields) : [],
            'insert' => $requestKpFormFields->isNotEmpty() ? $requestKpFormFields->diff($issuedKpFormFields) : []
        );
        
        if (count($updates['remove'])) {
            IssuedKpFormField::where('issued_kp_form_id', $model->id)->where('tag_id', $tagId)->whereIn('value', $updates['remove'])->delete();
        }

        if (count($updates['insert'])) {
            $inserts = array();

            foreach ($updates['insert'] as $value) {
                if ($value) {
                    array_push($inserts, [
                        'issued_kp_form_id' => $kpFormId,
                        'tag_id' => $tagId,
                        'value' => $value
                    ]);
                }
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

    public function handleKpFormKeysUpdate($model, $request, $kpFormId, $tagIds)
    {
        $issuedKpFormFields = IssuedKpFormField::where('issued_kp_form_id', $model->id)->whereIn('tag_id', $tagIds)->select('tag_id', 'value')->get()->mapWithKeys(function ($row) {
            return [$row->tag_id => $row->value];
        });

        $requestKpFormFields = collect($request)->filter(function ($item, $key) use ($tagIds) {
            if (collect($tagIds)->contains($key)) {
                return [$key => $item];
            }
        });

        $updates = array(
            'remove' => array(),
            'update' => array()
        );

        foreach ($requestKpFormFields as $requestKey => $requestValue) {
            if ($issuedKpFormFields->has($requestKey) && $requestValue == null) {
                array_push($updates['remove'], $requestKey);
                continue;
            }

            if (isset($requestValue)) {
                $updates['update'] += [$requestKey => $requestValue];
            }
        }

        // dd($updates['update'], $model->id);

        if (count($updates['remove'])) {
            IssuedKpFormField::where('issued_kp_form_id', $model->id)->whereIn('tag_id', $updates['remove'])->delete();
        }

        if (count($updates['update'])) {
            foreach ($updates['update'] as $key => $value) {
                // dd($key, $value);
                IssuedKpFormField::updateOrCreate(
                    ['issued_kp_form_id' => $model->id, 'tag_id' => $key],
                    ['value' => $value]
                );
            }
        }
    }
}
