<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlotterStatus extends Model
{
    use HasFactory;

    protected $table = 'blotter_status';

    public function records(): HasMany
    {
        return $this->hasMany(Record::class);
    }

    public function getAllBlotterStatus(): Collection
    {
        return $this->get(['id', 'name']);
    }
}
