<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Paiement extends Model
{
    protected $table = 'paiements';

    protected $primaryKey = 'id_paiement';

    protected $fillable = [
        'montant',
        'mode_paiement',
        'date_paiement',
        'statut',
        'reference',
        'id_commande',
    ];

    protected $casts = [
        'montant' => 'decimal:2',
        'date_paiement' => 'datetime',
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