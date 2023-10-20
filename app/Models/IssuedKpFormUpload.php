<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IssuedKpFormUpload extends Model
{
    use HasFactory;

    protected $fillable = [
        'record_id',
        'name',
        'path',
    ];

    public function record(): BelongsTo
    {
        return $this->belongsTo(Record::class);
    }
}
