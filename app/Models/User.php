<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Observers\UserObserver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'verified_at',
        'email',
        'password',
        'last_login',
        'contact_number',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function scopeNonAdmin()
    {
        return User::whereHas('roles', function ($query) {
            return $query->where('role_id', '!=', 1);
        })->get();
    }

    public function scopeGetBarangays()
    {
        return User::join('user_barangays', 'user_barangays.user_id', 'users.id')
            ->join('barangays', 'barangays.id', 'user_barangays.barangay_id');
    }

    public function scopeGetNonDeletedUsers(Builder $query)
    {
        return $query->whereNull("users.deleted_at")
            ->whereNotIn("users.id", [1, 2])
            ->join('user_barangays', 'user_barangays.user_id', 'users.id')
            ->join('barangays', 'barangays.id', 'user_barangays.barangay_id')
            ->select("users.username", "barangays.name as barangay_name");
    }

    public function scopeGetAdminUsers(Builder $query)
    {
        return $query->whereNull("users.deleted_at")
            ->whereIn("users.id", [1, 2])
            ->select("users.username");
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_roles')->withTimestamps();
    }

    public function barangays(): BelongsToMany
    {
        return $this->belongsToMany(Barangay::class, 'user_barangays')->withTimestamps();
    }

    public function otp(): HasOne
    {
        return $this->hasOne(OTP::class);
    }

    public function logintrails(): HasMany
    {
        return $this->HasMany(User::class);
    }
}
