<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stock extends Model
{
    protected $table = 'stocks';

    protected $primaryKey = 'id_stock';

    protected $fillable = [
        'quantite',
        'date_mise_a_jour',
        'id_produit',
    ];

    protected $casts = [
        'date_mise_a_jour' => 'datetime',
    ];

    public function produit(): BelongsTo
    {
        return $this->belongsTo(
            Produit::class,
            'id_produit',
            'id_produit'
        );
    }
}