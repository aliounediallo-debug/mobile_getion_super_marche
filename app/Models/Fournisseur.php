<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fournisseur extends Model
{
    protected $table = 'fournisseurs';

    protected $primaryKey = 'id_fournisseur';

    protected $fillable = [
        'nom',
        'telephone',
        'email',
        'adresse',
    ];

    public function produits(): HasMany
    {
        return $this->hasMany(Produit::class, 'id_fournisseur', 'id_fournisseur');
    }
}