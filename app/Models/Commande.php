<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Commande extends Model
{
    protected $table = 'commandes';

    protected $primaryKey = 'id_commande';

    protected $fillable = [
        'date_commande',
        'montant_total',
        'statut',
        'adresse_livraison',
        'id_user',
    ];

    protected $casts = [
        'date_commande' => 'datetime',
        'montant_total' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'id_user',
            'id_user'
        );
    }

    public function lignes(): HasMany
    {
        return $this->hasMany(
            LigneCommande::class,
            'id_commande',
            'id_commande'
        );
    }

    public function paiement(): HasOne
    {
        return $this->hasOne(
            Paiement::class,
            'id_commande',
            'id_commande'
        );
    }

    public function livraison(): HasOne
    {
        return $this->hasOne(
            Livraison::class,
            'id_commande',
            'id_commande'
        );
    }
}