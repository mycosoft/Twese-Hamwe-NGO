<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $fillable = [
        'program_id',
        'title',
        'slug',
        'short_description',
        'description',
        'image',
        'location',
        'start_date',
        'end_date',
        'budget',
        'raised_amount',
        'status',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'budget' => 'decimal:2',
        'raised_amount' => 'decimal:2',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }
}
