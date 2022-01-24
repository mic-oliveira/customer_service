<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jamesh\Uuid\HasUuid;

class Document extends Model
{
    use HasFactory;
    use HasUuid;

    protected $table = 'documents';

    protected $fillable = [
        'document',
        'type',
        'emisison_date',
        'verified',
    ];

    protected $casts = [
        'type' => 'integer'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
}
