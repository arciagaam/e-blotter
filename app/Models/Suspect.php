<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Suspect extends Model
{
    use HasFactory;

    protected $fillable = [
        'record_id',
        'first_name',
        'middle_name',
        'last_name',
        'sex',
        'purok',
        'barangay',
        'municipality',
        'province',
    ];

    public function record(): BelongsTo
    {
        return $this->belongsTo(Record::class);
    }
}
