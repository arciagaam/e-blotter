<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summon extends Model
{
    use HasFactory;

    protected $fillable = [
        'record_id',
        'kp_form_id',
        'attempt',
    ];
}
