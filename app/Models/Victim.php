<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Victim extends Model
{
    use HasFactory;

    protected $fillable = [
        'record_id',
        'first_name',
        'middle_name',
        'last_name',
        'age',
        'sex',
        'contact_number',
        'purok',
        'barangay',
        'municipality',
        'province',
        'civil_status_id'
    ];

    public function record(): BelongsTo
    {
        return $this->belongsTo(Record::class);
    }


}
