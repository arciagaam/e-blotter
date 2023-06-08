<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IssuedKpFormField extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_id',
        'value',
    ];

    public function issuedKpForm(): BelongsTo
    {
        return $this->belongsTo(IssuedKpForm::class);
    }
}
