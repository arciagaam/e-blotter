<?php

namespace App\Actions;

use App\Models\IssuedKpForm;
use App\Models\Summon;
use App\Actions\Get;


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

    // SHOW MESSAGE AND RECOMMENDATION LOGIC

    public function checkIssuedKpForms(string $record, array $kpFormIds) {
        return IssuedKpForm::where('record_id', $record)
        ->whereIn('kp_form_id', $kpFormIds)
        ->get();
    }

    public function checkAttempts(string $record, array $kpFormIds)
    {
        return Summon::where('record_id', $record)
        ->wherein('kp_form_id', $kpFormIds)
        ->where('attempt', '>=', 3)
        ->get();
    }

    public function getMessageAndRecommendations($latestKpForm, string $record, GetKpFormMessageActions $action)
    {
        switch ($latestKpForm->kp_form_id) {
            case 7 : return $action->getKpForm7Message(); break;
            case 8 : 
            case 9 : return $action->getKpForm8and9Message($record, $this); break;
            case 18 : 
            case 19 : return $action->getKpForm18and19Message($record, $this); break;
            default : return [];
        }
        
    }
    
}
