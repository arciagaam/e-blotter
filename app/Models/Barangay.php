<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barangay extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'municipality',
        'province',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_barangays');
    }

    public function logintrails(): HasMany
    {
        return $this->hasMany(LoginTrail::class);

    }
}
