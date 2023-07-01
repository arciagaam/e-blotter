<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

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

    public function scopeGetSelectable(Builder $query)
    {
        $query->whereNotIn('number', [1, 2, 3, 4, 5, 6]);
    }
}
