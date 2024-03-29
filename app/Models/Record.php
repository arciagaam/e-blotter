<?php

namespace App\Models;

use App\Events\NewRecord;
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

    public static function booted()
    {
        static::created(function ($newRecord) {
            NewRecord::dispatch($newRecord);
        });
    }

    protected $fillable = [
        'barangay_id',
        'blotter_status_id',
        'barangay_blotter_number',
        'purok',
        'case',
        'narrative',
        'reliefs',
        'kp_deadline',
        'created_at'
    ];

    protected $guarded = [
        'narrative_file',
    ];

    protected $casts = [
        'kp_deadline' => 'date'
    ];

    public function scopeGetSearchQuery(Builder $query)
    {
  
        $query->when(request()->search, function ($q) {
            $q->join('blotter_status', 'blotter_status.id', 'records.blotter_status_id')
            ->join('suspects', 'suspects.record_id', 'records.id')
            ->join('victims', 'victims.record_id', 'records.id')
            ->where('records.purok', request()->search)
            ->orWhereRaw('CONCAT(suspects.first_name, " ", suspects.middle_name, " ", suspects.last_name) like ?', ["%".request()->search."%"])
            ->orWhereRaw('CONCAT(suspects.first_name, " ", suspects.last_name) like ?', ["%".request()->search."%"])
            ->orWhere('suspects.first_name', 'like', request()->search . '%')
            ->orWhere('suspects.middle_name', 'like', request()->search . '%')
            ->orWhere('suspects.last_name', 'like', request()->search . '%')
            ->orWhereRaw('CONCAT(victims.first_name, " ", victims.middle_name, " ", victims.last_name) like ?', ["%".request()->search."%"])
            ->orWhereRaw('CONCAT(victims.first_name, " ", victims.last_name) like ?', ["%".request()->search."%"])
            ->orWhere('victims.first_name', 'like', request()->search . '%')
            ->orWhere('victims.middle_name', 'like', request()->search . '%')
            ->orWhere('victims.last_name', 'like', request()->search . '%')
            ->orWhere('records.barangay_blotter_number', request()->search)
            ->orWhere('blotter_status.name', 'LIKE', "%".request()->search."%" )
            ->orWhere('records.case', 'LIKE', "%".request()->search."%" )
            ->orWhere('records.narrative', 'LIKE', "%".request()->search."%" )
            ->orWhere('records.reliefs', 'LIKE', "%".request()->search."%" );
        })
        ->when(request()->from, function ($q) {
            $q->where('records.created_at', '>=', date('Y-m-d', strtotime(request()->from)));
        })
        ->when(request()->to, function ($q) {
            $q->where('records.created_at', '<=', date('Y-m-d', strtotime(request()->to)));
        })
        ->when(request()->type, function ($q) {
            $q->where('records.blotter_status_id', '=', request()->type);
        })
        ->where('barangay_id', auth()->user()->barangays[0]->id)
        ->select('records.*');
    }

    public function scopeGetAdminSearchQuery(Builder $query)
    {
        $query->when(request()->search, function ($q) {
            $q->where('purok', request()->search);
        })
            ->when(request()->from, function ($q) {
                $q->where('created_at', '>=', date('Y-m-d', strtotime(request()->from)));
            })
            ->when(request()->to, function ($q) {
                $q->where('created_at', '<=', date('Y-m-d', strtotime(request()->to)));
            })
            ->when(request()->type, function ($q) {
                $q->where('blotter_status_id', '=', request()->type);
            });
    }

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

    public function issuedKpFormUploads(): HasMany
    {
        return $this->hasMany(IssuedKpFormUploads::class);
    }

    public function relatedKpForms(): HasOneOrMany
    {
        return $this->HasOneOrMany(IssuedKpForm::class);
    }

    public function latestRecord(string $barangay_id): Record | null
    {
        return $this->orderBy('barangay_blotter_number', 'desc')->where('barangay_id', $barangay_id)->withTrashed()->first();
    }

    public function scopeOfStatus(Builder $query, int $blotter_status_id)
    {
        return $query->where('barangay_id', auth()->user()->barangays[0]->id)->where('blotter_status_id', $blotter_status_id)->get();
    }

    public function scopeOfTotalStatus(Builder $query, int $blotter_status_id)
    {
        return $query->where('blotter_status_id', $blotter_status_id)->get();
    }

    public function scopeFilter(Builder $query, string $search = null)
    {
        if (isset($search)) {
            return $query->where('barangay_id', $search);
        }
    }
}
