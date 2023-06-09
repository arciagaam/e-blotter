<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Record extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'barangay_id',
        'blotter_status_id',
        'purok',
        'victim_id',
        'suspect_id',
        'case',
        'narrative',
        'narrative_file',
        'reliefs',
    ];

    public function victim(): HasOne
    {
        return $this->hasOne(Victim::class);
    }

    public function suspect(): HasOne
    {
        return $this->hasOne(Suspect::class);
    }

    public function barangays(): BelongsTo
    {
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }

    public function blotterStatus(): BelongsTo
    {
        return $this->belongsTo(BlotterStatus::class);
    }

    public function issuedKpForms(): HasMany
    {
        return $this->hasMany(IssuedKpForm::class);
    }

    public function relatedKpForms(): HasOneOrMany
    {
        return $this->HasOneOrMany(IssuedKpForm::class);
    }

    public function scopeOfStatus(Builder $query, int $blotter_status_id)
    {
        return $query->where('barangay_id', auth()->user()->barangays[0]->id)->where('blotter_status_id', $blotter_status_id)->get();
    }

    public function scopeFilter($query, string $search = null)
    {
        if (isset($search)) {
            return $query->where('barangay_id', $search);
        }
    }
}
