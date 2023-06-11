<?php

namespace App\Actions;

use App\Models\IssuedKpForm;
use App\Models\Summon;
use App\Actions\Get;
use App\Models\IssuedKpFormField;
use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\JoinClause;

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

    public function checkHearingDate(string $record, array $kpFormIds)
    {
        $latestHearingDates = array();

        $issuedKpForms = IssuedKpForm::where('record_id', $record)
        ->where('issued_kp_form_fields.tag_id', 'hearing')
        ->whereIn('kp_form_id', $kpFormIds)
        ->join('issued_kp_form_fields', 'issued_kp_form_fields.issued_kp_form_id', '=', 'issued_kp_forms.id')
        ->orderBy('issued_kp_forms.kp_form_id', 'asc')
        ->latest('issued_kp_forms.created_at')
        ->select('issued_kp_form_fields.value', 'issued_kp_forms.id', 'issued_kp_forms.kp_form_id', 'issued_kp_forms.created_at')
        ->get()
        ->groupBy('kp_form_id');

        if ($issuedKpForms) {
            foreach($issuedKpForms as $key => $value) {
                $latestHearingDates[$key] = $value[0];
                continue;
            }
        }

        return collect($latestHearingDates);
    }

    public function getMessageAndRecommendations($latestKpForm, string $record, GetKpFormMessageActions $action)
    {
        if (!isset($latestKpForm->kp_form_id)) {
            return [];
        }

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
