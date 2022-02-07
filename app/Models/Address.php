<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Jamesh\Uuid\HasUuid;

class Address extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'public_place',
        'address_type',
        'number',
        'person_id',
        'zipcode',
        'neighborhood_id',
    ];

    public function neighborhood(): BelongsTo
    {
        return $this->belongsTo(Neighborhood::class, 'neighborhood_id');
    }
}
