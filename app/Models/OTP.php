<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OTP extends Model
{
    use HasFactory;

    protected $table = 'otp';

    protected $fillable = [
        'user_id',
        'token',
        'expiration'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
