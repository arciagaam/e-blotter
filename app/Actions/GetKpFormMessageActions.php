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
            'recommendations' => 'Issue Form 8 and 9',
            'form_ids' => [8, 9]
        ];
    }

    public function getKpForm8and9Message(string $record_id, RecordKpFormActions $action): array
    {
        $issuedKpForms = $action->checkIssuedKpForms($record_id, [8, 9]);

        if ($issuedKpForms->contains('kp_form_id', 8) && !$issuedKpForms->contains('kp_form_id', 9)) {
            return [
                'message' => 'Form 8 Issued',
                'recommendations' => 'Issue Form 9',
                'form_ids' => [9]
            ];
        } else if (!$issuedKpForms->contains('kp_form_id', 8) && $issuedKpForms->contains('kp_form_id', 9)) {
            return [
                'message' => 'Form 9 Issued',
                'recommendations' => 'Issue Form 8',
                'form_ids' => [8]
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
                        'recommendations' => 'Issue Form 18',
                        'form_ids' => [18]

                    ];
                } else if (!$attempts->contains('kp_form_id', 8) && $attempts->contains('kp_form_id', 9)) {
                    return [
                        'message' => 'Maximum attempts reached for Respondent/s',
                        'recommendations' => 'Issue Form 19',
                        'form_ids' => [19]

                    ];
                } else if ($attempts->contains('kp_form_id', 8) && $attempts->contains('kp_form_id', 9)) {
                    return [
                        'message' => 'Maximum attempts reached for both Complainant/s and Respondent/s',
                        'recommendations' => 'Issue Form 18 and 19',
                        'form_ids' => [18, 19]

                    ];
                }
            }
        }

        if (count($hearingDates)) {
            if ($hearingDates->has([8, 9]) && ($now > strtotime($hearingDates[8]->value) && $now > strtotime($hearingDates[9]->value))) {
                return [
                    'message' => "Form 8 and 9 are both past the hearing date",
                    'recommendations' => "Issue Form 8 and 9",
                    'form_ids' => [8, 9]

                ];
            } else if ($hearingDates->has(8) && ($now > strtotime($hearingDates[8]->value))) {
                return [
                    'message' => "Form 8 is past the hearing date",
                    'recommendations' => "Issue Form 8",
                    'form_ids' => [8]

                ];
            } else if ($hearingDates->has(9) && ($now > strtotime($hearingDates[9]->value))) {
                return [
                    'message' => "Form 9 is past the hearing date",
                    'recommendations' => "Issue Form 9",
                    'form_ids' => [9]
                ];
            }
        }

        return [
            'message' => null,
            'recommendations' => null,
            'form_ids' => []
        ];
    }

    public function getKpForm10Message()
    {
        return [
            'message' => 'Form 10 Issued',
            'recommendations' => 'Issue Form 11',
            'form_ids' => [11]
        ];
    }

    public function getKpForm11Message()
    {
        return [
            'message' => 'Form 11 Issued',
            'recommendations' => 'Issue Form 12',
            'form_ids' => [12]

        ];
    }

    public function getKpForm12Message()
    {
        return [
            'message' => 'Form 12 Issued',
            'recommendations' => 'Issue Form 13',
            'form_ids' => [13]

        ];
    }

    public function getKpForm13Message()
    {
        return [
            'message' => 'Form 13 Issued',
            'recommendations' => 'Issue Form 14 if both parties attended the hearing, hence, issue forms 18 and 19',
            'form_ids' => [14, 18, 19]
        ];
    }

    public function getKpForm14Message()
    {
        return [
            'message' => 'Form 14 Issued',
            'recommendations' => 'Issue Form 15',
            'form_ids' => [15]

        ];
    }

    public function getKpForm15Message()
    {
        return [
            'message' => 'Form 15 Issued',
            'recommendations' => 'Issue Form 16',
            'form_ids' => [16]
        ];
    }

    public function getKpForm16Message(string $record_id)
    {

        $record = Record::find($record_id);
        $now = now()->format('Y-m-d');
        $difference = Carbon::parse($now)->diffInDays(Carbon::parse($record->kp_deadline->format('Y-m-d')), false);

        if ($difference > 0) {
            return [
                'message' => 'Form 16 Issued',
                'recommendations' => "Issue Form 25 after $difference day/s",
                'form_ids' => [16]

            ];
        }

        return [
            'message' => '10 days has passed since the issuance of Form 16',
            'recommendations' => 'Issue Form 25',
            'form_ids' => [25]
        ];
    }

    public function getKpForm17Message()
    {
        return [
            'message' => 'Form 17 Issued',
            'recommendations' => 'Issue Form 20',
            'form_ids' => [20]
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
                    'recommendation' => "Close the case.",
                    'form_ids' => []
                ];
            } else if ($hearingDates->has(18) && $now > strtotime($hearingDates[18]->value)) {
                return [
                    'message' => "Form 18 is past the hearing date",
                    'recommendation' => "Close the case.",
                    'form_ids' => []

                ];
            } else if ($hearingDates->has(19) && $now > strtotime($hearingDates[19]->value)) {
                return [
                    'message' => "Form 19 is past the hearing date",
                    'recommendation' => "Issue Form 20",
                    'form_ids' => [20]
                ];
            }
        }

        return [
            'message' => null,
            'recommendations' => null,
            'form_ids' => []
        ];
    }

    public function getKpForm20Message(string $record, RecordKpFormActions $action) : array
    {
        $issuedKpForms = $action->checkIssuedKpForms($record, [16]);

        if(count($issuedKpForms)) {
            return [
                'message' => 'Form 20 Issued, awit moments sa 16',
                'recommendations' => 'Issue Form 21',
                'form_ids' => [21]
            ];
        } else {
            return [
                'message' => 'Form 20 Issued, di sumipot sa 18 19',
                'recommendations' => 'Issue Form 21',
                'form_ids' => [21]
            ];
        }
    }

    public function getKpForm21and22Message(string $latestKpForm) : array
    {
        if($latestKpForm == 21) {
            return [
                'message' => 'Form 21 Issued',
                'recommendations' => 'Issue Form 23',
                'form_ids' => [23]
            ];
        } else {
            return [
                'message' => 'Form 22 Issued',
                'recommendations' => 'Issue Form 23',
                'form_ids' => [23]
            ];
        }
    }

    public function getKpForm23Message()
    {
        return [
            'message' => 'Form 23 Issued',
            'recommendations' => 'Issue Form 24',
            'form_ids' => [24]
        ];
    }

    public function getKpForm24Message()
    {
        return [
            'message' => 'Form 24 Issued',
            'recommendations' => 'Close Case',
            'form_ids' => []
        ];
    }

    public function getKpForm25Message()
    {
        return [
            'message' => 'Form 25 Issued',
            'recommendations' => 'Issue Form 27',
            'form_ids' => [27]
        ];
    }

    public function getKpForm27Message()
    {
        return [
            'message' => 'Form 27 Issued',
            'recommendations' => 'Close Case',
            'form_ids' => []
        ];
    }

}
