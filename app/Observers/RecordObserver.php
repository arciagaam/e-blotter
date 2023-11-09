<?php

namespace App\Observers;

use App\Models\AuditTrail;
use App\Models\Record;

class RecordObserver
{
    /**
     * Handle the Record "created" event.
     */

    public function getDefaults() {
        return [
            'barangay_id' => auth()->user()->barangays[0]->id, 
              
            'user_id' => auth()->user()->id,
        ];
    }

    public function created(Record $record): void
    {
        AuditTrail::create([
        ...$this->getDefaults(),
        'action' => "Created Blotter Record Number $record->barangay_blotter_number"]);
    }

    /**
     * Handle the Record "updated" event.
     */
    public function updated(Record $record): void
    {
        AuditTrail::create([
            ...$this->getDefaults(),
            'action' => "Created Blotter Record Number $record->barangay_blotter_number"]);
    }

    /**
     * Handle the Record "deleted" event.
     */
    public function deleted(Record $record): void
    {
        AuditTrail::create([
        ...$this->getDefaults(),
        'action' => "Deleted Blotter Record Number $record->barangay_blotter_number"]);
    }

    /**
     * Handle the Record "restored" event.
     */
    public function restored(Record $record): void
    {
        //
    }

    /**
     * Handle the Record "force deleted" event.
     */
    public function forceDeleted(Record $record): void
    {
        //
    }
}
