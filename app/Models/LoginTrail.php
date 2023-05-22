<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoginTrail extends Model
{
    use HasFactory;

    protected $table = 'login_trail';

    public function barangays(): BelongsTo
    {
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }

    public function loginroles(): BelongsTo
    {
        return $this->belongsTo(LoginRole::class, 'login_role_id');

    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
