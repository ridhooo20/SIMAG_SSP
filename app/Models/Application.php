<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    protected $fillable = [
    'user_id',
    'position_id',
    'registration_number',
    'status',
    'phone',
    'institution',
    'study_program',
    'start_date',
    'end_date',
    'cover_letter',
    'company_document',
    'permission_letter',
    'portfolio',
    'notes',
];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }
}
