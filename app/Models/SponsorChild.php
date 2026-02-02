<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SponsorChild extends Model
{
    protected $table = 'sponsor_children';

    protected $fillable = [
        'name',
        'slug',
        'date_of_birth',
        'gender',
        'location',
        'story',
        'needs',
        'image',
        'monthly_amount',
        'is_sponsored',
        'sponsor_name',
        'sponsor_email',
        'is_active',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'monthly_amount' => 'decimal:2',
        'is_sponsored' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }
}
