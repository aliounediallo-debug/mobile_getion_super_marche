<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Livraison extends Model
{
    protected $table = 'livraisons';

    protected $primaryKey = 'id_livraison';

    protected $fillable = [
        'adresse',
        'date_livraison',
        'statut',
        'id_commande',
    ];

    protected $casts = [
        'date_livraison' => 'datetime',
    ];

    public function commande(): BelongsTo
    {
        return $this->belongsTo(
            Commande::class,
            'id_commande',
            'id_commande'
        );
    }
}