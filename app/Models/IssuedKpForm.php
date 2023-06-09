<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function scopeRelatedKpForms(Builder $query, string $recordId, array $relations)
    {
        $getRelatedFields = $query
            ->join('issued_kp_form_fields', 'issued_kp_forms.id', '=', 'issued_kp_form_fields.issued_kp_form_id')
            ->select('issued_kp_form_fields.tag_id', 'issued_kp_form_fields.value', 'issued_kp_forms.*')
            ->where('record_id', $recordId)
            ->where('kp_form_id', $relations[0])
            ->get();

        dd($getRelatedFields);
        
        // return $query->where('record_id', $recordId);
        // $relatedFormsDb = $this->query();


        // foreach($relations as $relation) {
        //     $relatedFormsDb = $relatedFormsDb->where('kp_form_id', $relation);
        // }
        
        // return $relatedFormsDb->get();
    }

}
