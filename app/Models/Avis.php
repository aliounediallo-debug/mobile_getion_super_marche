<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Avis extends Model
{
    protected $table = 'avis';

    protected $primaryKey = 'id_avis';

    protected $fillable = [
        'note',
        'commentaire',
        'date_avis',
        'id_user',
        'id_produit',
    ];

    protected $casts = [
        'date_avis' => 'datetime',
        'note' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'id_user',
            'id_user'
        );
    }

    public function produit(): BelongsTo
    {
        return $this->belongsTo(
            Produit::class,
            'id_produit',
            'id_produit'
        );
    }
}