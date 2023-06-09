<?php

namespace App\Actions;

use App\Models\IssuedKpForm;

class RecordKpFormActions
{
    public function handleShow(string $recordId, string $issuedKpFormId)
    {
        $issuedForm = IssuedKpForm::with([
            'issuedKpFormFields',
            'record' => ['victim', 'suspect']
        ])->where('id', $issuedKpFormId)->where('record_id', $recordId)->first();

        $tagIds = $issuedForm->issuedKpFormFields->mapWithKeys(function ($item, int $key) {
            return [$item['tag_id'] => $item['value']];
        });

        $forms = array();
        $relatedForms = IssuedKpForm::relatedKpForms($recordId, getKpRelations($issuedForm->kp_form_id));

        foreach ($relatedForms as $key => $item) {
            if (array_key_exists($item['kp_form_id'], $forms)) {
                $forms[$item['kp_form_id']][$item['tag_id']] = $item['value'];
                continue;
            }

            $forms[$item['kp_form_id']][$item['tag_id']] = $item['value'];
            $forms[$item['kp_form_id']]['id'] = $item['id'];
            $forms[$item['kp_form_id']]['record_id'] = $item['record_id'];
            $forms[$item['kp_form_id']]['kp_form_id'] = $item['kp_form_id'];
            $forms[$item['kp_form_id']]['created_at'] = $item['created_at'];
        }

        return [$issuedForm, $tagIds, $forms];
    }
}
