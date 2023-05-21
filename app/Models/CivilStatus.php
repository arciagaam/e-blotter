<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CivilStatus extends Model
{
    use HasFactory;

    protected $table = 'civil_status';

    public function getAllCivilStatus(): Collection
    {
        return $this->get(['id', 'name']);
    }
}
