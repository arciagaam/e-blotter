<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuditTrail extends Model
{
    use HasFactory;

    protected $table = 'audit_trail';

    protected $fillable = [
        'barangay_id',
        'user_id',
        'action'
    ];

    public function barangays(): BelongsTo
    {
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
