<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Jamesh\Uuid\HasUuid;

class Document extends Model
{
    use HasFactory;
    use HasUuid;

    protected $table = 'documents';

    protected $fillable = [
        'document',
        'type',
        'emission_date',
        'verified',
        'person_id'
    ];

    protected $casts = [
        'type' => 'integer',
        'verified' => 'boolean'
    ];

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
}
