<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rablist3 extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function rablist1(): BelongsTo
    {
        return $this->belongsTo(Rablist1::class);
    }
}
