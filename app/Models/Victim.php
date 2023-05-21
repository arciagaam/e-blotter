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
        'name',
        'age',
        'sex',
        'contact_number',
        'address',
        'civil_status_id'
    ];

    public function record(): BelongsTo
    {
        return $this->belongsTo(Record::class);
    }


}
