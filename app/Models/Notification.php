<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $primaryKey = 'id_notification';

    protected $fillable = [
        'titre',
        'message',
        'date_notification',
        'lu',
        'id_user',
    ];

    protected $casts = [
        'date_notification' => 'datetime',
        'lu' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'id_user',
            'id_user'
        );
    }
}