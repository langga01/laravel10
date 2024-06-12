<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aspek extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function indikator(): HasMany
    {
        return $this->hasMany(Indikator::class);
    }

    public function domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class);
    }
}
