<?php

namespace App\Models;

use App\Events\NewBarangay;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barangay extends Model
{
    use HasFactory;

    protected $fillable = [
        'captain_first_name',
        'captain_last_name',
        'name',
        'logo'
    ];

    public static function booted() {
        static::created(function($barangay) {
            NewBarangay::dispatch($barangay);
        });
    }

    public function scopeUserNotTrashed(Builder $query) {
        $query->join('user_barangays', 'user_barangays.barangay_id', 'barangays.id')
        ->join('users', 'users.id', 'user_barangays.user_id')
        ->where('users.deleted_at', null);
    }

    public function scopeGetExisting(Builder $query) {
        $query->with('users');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_barangays');
    }

    public function logintrails(): HasMany
    {
        return $this->hasMany(LoginTrail::class);
    }

    public function records(): HasMany
    {
        return $this->hasMany(Record::class);
    }

    public function puroks(): HasMany
    {
        return $this->hasMany(Purok::class);
    }
}
