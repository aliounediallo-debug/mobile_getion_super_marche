<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produit extends Model
{
    protected $table = 'produits';

    protected $primaryKey = 'id_produit';

    protected $fillable = [
        'nom',
        'description',
        'prix',
        'image',
        'stock_min',
        'etat',
        'id_categorie',
        'id_fournisseur',
        'id_promotion',
    ];

    protected $casts = [
        'prix' => 'decimal:2',
        'etat' => 'boolean',
    ];

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(
            Categorie::class,
            'id_categorie',
            'id_categorie'
        );
    }

    public function fournisseur(): BelongsTo
    {
        return $this->belongsTo(
            Fournisseur::class,
            'id_fournisseur',
            'id_fournisseur'
        );
    }

    public function promotion(): BelongsTo
    {
        return $this->belongsTo(
            Promotion::class,
            'id_promotion',
            'id_promotion'
        );
    }

    public function stock(): HasOne
    {
        return $this->hasOne(
            Stock::class,
            'id_produit',
            'id_produit'
        );
    }

    public function lignesCommande(): HasMany
    {
        return $this->hasMany(
            LigneCommande::class,
            'id_produit',
            'id_produit'
        );
    }

    public function avis(): HasMany
    {
        return $this->hasMany(
            Avis::class,
            'id_produit',
            'id_produit'
        );
    }
}