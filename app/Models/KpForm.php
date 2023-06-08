<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KpForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'name',
    ];

    public function issuedKpForms(): HasMany
    {
        return $this->hasMany(IssuedKpForm::class);
    }
}
