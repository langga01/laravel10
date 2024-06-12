<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rablist1 extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function rablist2(): HasMany
    {
        return $this->hasMany(Rablist2::class);
    }
}
