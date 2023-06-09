<?php

namespace App\Actions;

use App\Models\IssuedKpForm;
use App\Models\Summon;

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

    public function checkAttempts(string $record)
    {
        return Summon::where('record_id', $record)
        ->wherein('kp_form_id', [8, 9])
        ->where('attempt', '>=', 3)
        ->get();
    }

    public function getMessage($latestKpForm, string $record)
    {
        if($latestKpForm->kp_form_id == 8 || $latestKpForm->kp_form_id == 9) {
            $checkAttempt = $this->checkAttempts($record);
            if(count($checkAttempt)) {
                $for = '';

                foreach($checkAttempt as $index => $ca) {
                    $for .= $ca->kp_form_id == 8 ? 'Complainant/s' : 'Respondent/s';

                    if(count($checkAttempt) > 1 && $index != count($checkAttempt)-1) {
                        $for .= ' and ';
                    } 
                }

                dd("Max Attempt Reached for $for");
            }   
        }
    }
    
}
