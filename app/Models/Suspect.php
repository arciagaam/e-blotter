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
        'name',
        'sex',
        'address',
    ];

    public function record(): BelongsTo
    {
        return $this->belongsTo(Record::class);
    }
}
