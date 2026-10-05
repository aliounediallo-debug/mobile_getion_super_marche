<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LigneCommande extends Model
{
    protected $table = 'ligne_commandes';

    protected $primaryKey = 'id_ligne';

    protected $fillable = [
        'quantite',
        'prix_unitaire',
        'sous_total',
        'id_commande',
        'id_produit',
    ];

    protected $casts = [
        'prix_unitaire' => 'decimal:2',
        'sous_total' => 'decimal:2',
    ];

    public function commande(): BelongsTo
    {
        return $this->belongsTo(
            Commande::class,
            'id_commande',
            'id_commande'
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