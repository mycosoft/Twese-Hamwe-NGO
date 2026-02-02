<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    protected $fillable = [
        'project_id',
        'sponsor_child_id',
        'donor_name',
        'donor_email',
        'donor_phone',
        'donor_address',
        'amount',
        'currency',
        'payment_method',
        'transaction_id',
        'status',
        'type',
        'message',
        'is_anonymous',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'is_anonymous' => 'boolean',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function sponsorChild(): BelongsTo
    {
        return $this->belongsTo(SponsorChild::class);
    }
}
