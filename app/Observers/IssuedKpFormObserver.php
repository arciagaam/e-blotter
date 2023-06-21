<?php

namespace App\Observers;

use App\Models\AuditTrail;
use App\Models\IssuedKpForm;
use App\Models\Record;

class IssuedKpFormObserver
{
    /**
     * Handle the IssuedKpForm "created" event.
     */

    public function getDefaults() {
        return [
            'barangay_id' => auth()->user()->barangays[0]->id, 
            'login_role_id' => session()->get('login_role'), 
            'user_id' => auth()->user()->id,
        ];
    }

    public function created(IssuedKpForm $issuedKpForm): void
    {
        $recordNumber = Record::find($issuedKpForm->record_id)->first()->barangay_blotter_number;
        
        AuditTrail::create([
        ...$this->getDefaults(),
        'action' => "Issued KP Form #$issuedKpForm->kp_form_id on Blotter Record $recordNumber"]);
    }

    /**
     * Handle the IssuedKpForm "updated" event.
     */
    public function updated(IssuedKpForm $issuedKpForm): void
    {
        //
    }

    /**
     * Handle the IssuedKpForm "deleted" event.
     */
    public function deleted(IssuedKpForm $issuedKpForm): void
    {
        //
    }

    /**
     * Handle the IssuedKpForm "restored" event.
     */
    public function restored(IssuedKpForm $issuedKpForm): void
    {
        //
    }

    /**
     * Handle the IssuedKpForm "force deleted" event.
     */
    public function forceDeleted(IssuedKpForm $issuedKpForm): void
    {
        //
    }
}
