<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Jamesh\Uuid\HasUuid;

class Person extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'name',
        'birthdate'
    ];

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'person_id');
    }

    public function documents(): hasMany
    {
        return $this->hasMany(Document::class, 'person_id');
    }
}
