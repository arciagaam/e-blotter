<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IssuedKpForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'record_id',
        'kp_form_id',
    ];

    public function record(): BelongsTo
    {
        return $this->belongsTo(Record::class);
    }

    public function kpForm(): BelongsTo
    {
        return $this->belongsTo(KpForm::class);
    }

    public function issuedKpFormFields(): HasMany
    {
        return $this->hasMany(IssuedKpFormField::class);
    }

    public function scopeRelatedKpForms($relations)
    {
        $relatedFormsDb = IssuedKpForm::query();
        foreach($relations as $relation) {
            $relatedFormsDb = $relatedFormsDb->where('kp_form_id', $relation);
        }
        
        return $relatedFormsDb->get();
    }

}
