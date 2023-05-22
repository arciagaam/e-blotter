<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LoginRole extends Model
{
    use HasFactory;

    protected $table = 'login_roles';

    public function logintrails(): HasMany
    {
        return $this->HasMany(LoginTrail::class);
    }
}
