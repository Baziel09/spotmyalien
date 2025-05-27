<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\ReportType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    protected $fillable = [
        'date',
        'country',
        'city',
        'street',
        'type',
        'description',
        'user_id',
        'validated',
        'photo_path',
    ];

    protected $casts = [
        'type' => ReportType::class,
        'validated' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
