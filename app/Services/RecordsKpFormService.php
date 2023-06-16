<?php

namespace App\Services;

use App\Models\IssuedKpForm;

class RecordsKpFormService {

    public function checkLatestKpForm(string $record_id)
    {
        return IssuedKpForm::getLatest($record_id)->first();
    }

    // Checker kung ano yung latest issued kp form

    // If pang summon na kp form count

    // Date checker para sa 15 days

    // Record Status checker

}
