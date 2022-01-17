<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Neighborhood extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city_id',
    ];

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'neighborhood_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
