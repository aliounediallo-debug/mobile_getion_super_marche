<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Promotion extends Model
{
    protected $table = 'promotions';

    protected $primaryKey = 'id_promotion';

    protected $fillable = [
        'titre',
        'pourcentage',
        'date_debut',
        'date_fin',
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
        'pourcentage' => 'decimal:2',
    ];

    public function produits(): HasMany
    {
        return $this->hasMany(Produit::class, 'id_promotion', 'id_promotion');
    }
}