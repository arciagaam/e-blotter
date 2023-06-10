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

    public function checkIfEightOrNine($latestKpForm) : bool {
        return $latestKpForm->kp_form_id == 8 || $latestKpForm->kp_form_id == 9;
    }

    public function checkIfEighteenOrNineteen($latestKpForm) : bool {
        return $latestKpForm->kp_form_id == 18 || $latestKpForm->kp_form_id == 19;
    }

    public function getEightOrNineMessage($checkAttempt) {
        if(count($checkAttempt)) {
            $for = '';

            foreach($checkAttempt as $index => $ca) {
                $for .= $ca->kp_form_id == 8 ? 'Complainant/s' : 'Respondent/s';

                if(count($checkAttempt) > 1 && $index != count($checkAttempt)-1) {
                    $for .= ' and ';
                } 
            }

            return "Max Attempt Reached for $for";
        }  

        return null;
    }

    public function getEighteenOrNineteenMessage(string $record, $checkAttempts) : array {
        
        $issuedKpForms = $this->checkKpForms($record, [18, 19]);
        if(count($issuedKpForms)) {
            $for = '';
            $form = '';
            $recommendations = array();

            $issuedKpFormsArray = $issuedKpForms->map(function($item, $key) {
                return $item['kp_form_id']; 
            });
            //8 9

            // dd($issuedKpForms);

            foreach($checkAttempts as $index => $checkAttempt) {

                if($checkAttempt->kp_form_id == 8 && !in_array(18, $issuedKpFormsArray->toArray())) {
                    $for .= 'Complainant/s ';
                    $form .= '18 ';
                    array_push($recommendations, 'Form 18');
                } else if ($checkAttempt->kp_form_id == 9 && !in_array(19, $issuedKpFormsArray->toArray())) {
                    $for .= 'Respondent/s ';
                    $form .= '19 ';
                    array_push($recommendations, 'Form 19');
                } else {
                    continue;
                }

                if(count($checkAttempts) > 1 && $index != count($checkAttempts)-1) {
                    $for .= ' and ';
                    $form .= ' and ';
                }
            }

            return [
                'message' => "Form/s $form is not yet issued for $for",
                'recommendations' => $recommendations
            ];
        }
    }

    public function checkKpForms(string $record, array $kpFormIds) {
        return IssuedKpForm::where('record_id', $record)
        ->whereIn('kp_form_id', $kpFormIds)
        ->get();
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
        $recommendations = array();

        if($this->checkIfEightOrNine($latestKpForm)) {
            $summons = $this->checkAttempts($record);
            $message = $this->getEightOrNineMessage($summons);
            $recommendations = [...$this->loopForRecommendations($summons ?? collect([$latestKpForm]))];
        }

        if($this->checkIfEighteenOrNineteen($latestKpForm)) {
            $summons = $this->checkAttempts($record);
            ['message' => $message, 'recommendations' => $recommendations] = $this->getEighteenOrNineteenMessage($record, $summons);
        }

        switch($latestKpForm->id) {
            case 18: break;
            case 19: break;
        }
        
        dd($message ?? 'No Warnings', $recommendations ?? 'No Recommendations');
        
    }

    public function loopForRecommendations($latestKpForm) {
        $returnArray = array();
        foreach($latestKpForm as $latestKpForm) {
            array_push($returnArray, ...$this->getRecommendation($latestKpForm->kp_form_id)); 
        }
        return $returnArray;
    }

    public function getRecommendation($kpFormId) : array {
        switch ($kpFormId) {
            case 8 : return ['Form 18']; break;
            case 9 : return ['Form 19']; break;
            case 18 : return ['Form 20']; break;
            case 19 : return ['Form 20']; break;
            default : return [];
        }
    }
    
}
