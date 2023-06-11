<?php

namespace App\Actions;

use App\Models\Record;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class GetKpFormMessageActions
{

    public function getKpForm7Message(): array
    {
        return [
            'message' => 'Form 7 Issued',
            'recommendations' => 'Issue Form 8 and 9'
        ];
    }

    public function getKpForm8and9Message(string $record_id, RecordKpFormActions $action): array
    {
        $issuedKpForms = $action->checkIssuedKpForms($record_id, [8, 9]);

        if ($issuedKpForms->contains('kp_form_id', 8) && !$issuedKpForms->contains('kp_form_id', 9)) {
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
        $hearingDates = $action->checkHearingDate($record_id, [8, 9]);
        $now = strtotime(now());

        if (count($attempts)) {
            if ($hearingDates->hasAny([8, 9]) && ($now > strtotime($hearingDates[8]->value) || $now > strtotime($hearingDates[9]->value))) {
                if ($attempts->contains('kp_form_id', 8) && !$attempts->contains('kp_form_id', 9)) {
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
            }
        }

        if (count($hearingDates)) {
            if ($hearingDates->has([8, 9]) && ($now > strtotime($hearingDates[8]->value) && $now > strtotime($hearingDates[9]->value))) {
                return [
                    'message' => "Form 8 and 9 are both past the hearing date",
                    'recommendation' => "Issue Form 8 and 9"
                ];
            } else if ($hearingDates->has(8) && ($now > strtotime($hearingDates[8]->value))) {
                return [
                    'message' => "Form 8 is past the hearing date",
                    'recommendation' => "Issue Form 8"
                ];
            } else if ($hearingDates->has(9) && ($now > strtotime($hearingDates[9]->value))) {
                return [
                    'message' => "Form 9 is past the hearing date",
                    'recommendation' => "Issue Form 9"
                ];
            }
        }

        return [
            'message' => 'Wala pang nangyayari',
            'recommendations' => 'Wait ka muna lods'
        ];
    }

    function getKpForm10Message() {
        return [
            'message' => 'Form 10 Issued',
            'recommendations' => 'Issue Form 11'
        ];
    }

    function getKpForm11Message() {
        return [
            'message' => 'Form 11 Issued',
            'recommendations' => 'Issue Form 12'
        ];
    }

    function getKpForm12Message() {
        return [
            'message' => 'Form 12 Issued',
            'recommendations' => 'Issue Form 13'
        ];
    }

    function getKpForm16Message(string $record_id) {

        $record = Record::find($record_id);
        $now = now()->format('Y-m-d');
        $difference = Carbon::parse($now)->diffInDays(Carbon::parse($record->kp_deadline->format('Y-m-d')), false);

        if($difference > 0) {
            return [
                'message' => 'Form 16 Issued',
                'recommendations' => "Issue Form 25 after $difference day/s"
            ];
        } 

        return [
            'message' => '10 days has passed',
            'recommendations' => 'Issue Form 25'
        ];
    }

    public function getKpForm18and19Message(string $record_id, RecordKpFormActions $action): array
    {
        $hearingDates = $action->checkHearingDate($record_id, [18, 19]);
        $now = strtotime(now());
        
        if (count($hearingDates)) {
            if ($hearingDates->has([18, 19]) && ($now > strtotime($hearingDates[18]->value) && $now > strtotime($hearingDates[19]->value))) {
                return [
                    'message' => "Form 18 and 19 are both past the hearing date",
                    'recommendation' => "Close the case."
                ];
            } else if ($hearingDates->has(18) && $now > strtotime($hearingDates[18]->value)) {
                return [
                    'message' => "Form 18 is past the hearing date",
                    'recommendation' => "Close the case."
                ];
            } else if ($hearingDates->has(19) && $now > strtotime($hearingDates[19]->value)) {
                return [
                    'message' => "Form 19 is past the hearing date",
                    'recommendation' => "Issue Form 20"
                ];
            }
        }

        return [
            'message' => 'Wala pang nangyayari',
            'recommendations' => 'Wait ka muna lods'
        ];
    }
}
