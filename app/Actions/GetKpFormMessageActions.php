<?php

namespace App\Actions;

use App\Models\Record;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class GetKpFormMessageActions
{
    public function generateMessage(string|null $message, string|null $recommendations, array $formIds): array
    {
        return [
            'message' => $message,
            'recommendations' => $recommendations,
            'form_ids' => $formIds
        ];
    }

    public function getKpForm7Message(): array
    {
        return $this->generateMessage('Form 7 Issued', 'Issue Form 8 and 9', [8, 9]);
    }

    public function getKpForm8and9Message(string $record_id, RecordKpFormActions $action): array
    {
        $issuedKpForms = $action->checkIssuedKpForms($record_id, [8, 9]);

        if ($issuedKpForms->contains('kp_form_id', 8) && !$issuedKpForms->contains('kp_form_id', 9)) {
            return $this->generateMessage('Form 8 Issued', 'Issue Form 9', [9]);
        } else if (!$issuedKpForms->contains('kp_form_id', 8) && $issuedKpForms->contains('kp_form_id', 9)) {
            return $this->generateMessage('Form 9 Issued', 'Issue Form 8', [8]);
        }

        $attempts = $action->checkAttempts($record_id, [8, 9]);
        $hearingDates = $action->checkHearingDate($record_id, [8, 9]);
        $now = strtotime(now());

        if (count($attempts)) {
            if ($hearingDates->hasAny([8, 9]) && ($now > strtotime($hearingDates[8]->value) || $now > strtotime($hearingDates[9]->value))) {
                if ($attempts->contains('kp_form_id', 8) && !$attempts->contains('kp_form_id', 9)) {
                    return $this->generateMessage('Maximum attempts reached for Complainant/s', 'Issue Form 18', [18]);
                } else if (!$attempts->contains('kp_form_id', 8) && $attempts->contains('kp_form_id', 9)) {
                    return $this->generateMessage('Maximum attempts reached for Respondent/s', 'Issue Form 19', [19]);
                } else if ($attempts->contains('kp_form_id', 8) && $attempts->contains('kp_form_id', 9)) {
                    return $this->generateMessage('Maximum attempts reached for both Complainant/s and Respondent/s', 'Issue Form 18 and 19', [18, 19]);
                }
            }
        }

        if (count($hearingDates)) {
            if ($hearingDates->has([8, 9]) && ($now > strtotime($hearingDates[8]->value) && $now > strtotime($hearingDates[9]->value))) {
                return $this->generateMessage('Form 8 and 9 are both past the hearing date', 'Issue Form 8 and 9', [8, 9]);
            } else if ($hearingDates->has(8) && ($now > strtotime($hearingDates[8]->value))) {
                return $this->generateMessage('Form 8 is past the hearing date', 'Issue Form 8', [8]);
            } else if ($hearingDates->has(9) && ($now > strtotime($hearingDates[9]->value))) {
                return $this->generateMessage('Form 9 is past the hearing date', 'Issue Form 9', [9]);
            }
        }

        return $this->generateMessage(null, null, []);
    }

    public function getKpForm10Message()
    {
        return $this->generateMessage('Form 10 Issued', 'Issue Form 11', [11]);
    }

    public function getKpForm11Message()
    {
        return $this->generateMessage('Form 11 Issued', 'Issue Form 12', [12]);
    }

    public function getKpForm12Message()
    {
        return $this->generateMessage('Form 12 Issued', 'Issue Form 13', [13]);
    }

    public function getKpForm13Message()
    {
        return $this->generateMessage('Form 13 Issued', 'Issue Form 14 if both parties attended the hearing, hence, issue forms 18 and 19', [14, 18, 19]);
    }

    public function getKpForm14Message()
    {
        return $this->generateMessage('Form 14 Issued', 'Issue Form 15', [15]);
    }

    public function getKpForm15Message()
    {
        return $this->generateMessage('Form 15 Issued', 'Issue Form 16', [16]);
    }

    public function getKpForm16Message(string $record_id)
    {

        $record = Record::find($record_id);
        $now = now()->format('Y-m-d');
        $difference = Carbon::parse($now)->diffInDays(Carbon::parse($record->kp_deadline->format('Y-m-d')), false);

        if ($difference > 0) {
            return $this->generateMessage('Form 16 Issued', "Issue Form 25 after $difference day/s", []);
        }

        return $this->generateMessage('10 days has passed since the issuance of Form 16', "Issue Form 25", [25]);
    }

    public function getKpForm17Message()
    {
        return $this->generateMessage('Form 17 Issued', 'Issue Form 20', [20]);
    }

    public function getKpForm18and19Message(string $record_id, RecordKpFormActions $action): array
    {
        $hearingDates = $action->checkHearingDate($record_id, [18, 19]);
        $now = strtotime(now());

        if (count($hearingDates)) {
            if ($hearingDates->has([18, 19]) && ($now > strtotime($hearingDates[18]->value) && $now > strtotime($hearingDates[19]->value))) {
                return $this->generateMessage('Form 18 and 19 are both past the hearing date', 'Close the case', []);
            } else if ($hearingDates->has(18) && $now > strtotime($hearingDates[18]->value)) {
                return $this->generateMessage('Form 18 is past the hearing date', 'Close the case', []);
            } else if ($hearingDates->has(19) && $now > strtotime($hearingDates[19]->value)) {
                return $this->generateMessage('Form 19 is past the hearing date', 'Issue Form 20', [20]);
            }
        }

        return $this->generateMessage(null, null, []);
    }

    public function getKpForm20Message(string $record, RecordKpFormActions $action) : array
    {
        $issuedKpForms = $action->checkIssuedKpForms($record, [16]);

        if(count($issuedKpForms)) {
            return $this->generateMessage('Form 20 Issued and agreement from Form 16 was not followed', 'Issue Form 21', [21]);
        } else {
            return $this->generateMessage('Form 20 Issued and either parties did not attend the hearing', 'Issue Form 22', [22]);
        }
    }

    public function getKpForm21and22Message(string $latestKpForm) : array
    {
        if($latestKpForm == 21) {
            return $this->generateMessage('Form 21 Issued', 'Issue Form 23', [23]);
        } else {
            return $this->generateMessage('Form 22 Issued', 'Issue Form 23', [23]);
        }
    }

    public function getKpForm23Message()
    {
        return $this->generateMessage('Form 23 Issued', 'Issue Form 24', [24]);
    }

    public function getKpForm24Message()
    {
        return $this->generateMessage('Form 24 Issued', 'Close the case', []);
    }

    public function getKpForm25Message()
    {
        return $this->generateMessage('Form 25 Issued', 'Issue Form 27', [27]);
    }

    public function getKpForm27Message()
    {
        return $this->generateMessage('Form 27 Issued', 'Close the case', []);
    }

}
