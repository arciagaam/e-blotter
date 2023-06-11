<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Model;

class GetKpFormMessageActions {

    public function getKpForm7Message() : array {
        return [
            'message' => 'Form 7 Issued',
            'recommendations' => 'Issue Form 8 and 9'
        ];
    }

    public function getKpForm8and9Message(string $record_id, RecordKpFormActions $action) : array {
        $issuedKpForms = $action->checkIssuedKpForms($record_id, [8, 9]);

        if($issuedKpForms->contains('kp_form_id', 8) && !$issuedKpForms->contains('kp_form_id', 9)) {
            return [
                'message' => 'Form 8 Issued',
                'recommendations' => 'Issue Form 9'
            ];
        } else if (!$issuedKpForms->contains('kp_form_id', 8) && $issuedKpForms->contains('kp_form_id', 9)) {
            return [
                'message' => 'Form 9 Issued',
                'recommendations' => 'Issue Form 8'
            ];
        }
                
        $attempts = $action->checkAttempts($record_id, [8, 9]);
        
        if($attempts->contains('kp_form_id', 8) && !$attempts->contains('kp_form_id', 9)) {
            return [
                'message' => 'Maximum attempts reached for Complainant/s',
                'recommendations' => 'Issue Form 18'
            ];
        } else if (!$attempts->contains('kp_form_id', 8) && $attempts->contains('kp_form_id', 9)) {
            return [
                'message' => 'Maximum attempts reached for Respondent/s',
                'recommendations' => 'Issue Form 19'
            ];
        } else if ($attempts->contains('kp_form_id', 8) && $attempts->contains('kp_form_id', 9)) {
            return [
                'message' => 'Maximum attempts reached for both Complainant/s and Respondent/s',
                'recommendations' => 'Issue Form 18 and 19'
            ];
        }
        
        return [
            'message' => 'Wala pang nangyayari',
            'recommendations' => 'Wait ka muna lods'
        ];
    }

    public function getKpForm18and19Message(string $record_id, RecordKpFormActions $action) : array {
        // date based
        return [
            'message' => 'Wala pang nangyayari',
            'recommendations' => 'Wait ka muna lods'
        ];
    }

}