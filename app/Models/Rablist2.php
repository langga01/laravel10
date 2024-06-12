<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rablist2 extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function rablist3(): HasMany
    {
        return $this->hasMany(Rablist3::class);
    }

    public function rablist1(): BelongsTo
    {
        return $this->belongsTo(Rablist1::class);
    }
}
