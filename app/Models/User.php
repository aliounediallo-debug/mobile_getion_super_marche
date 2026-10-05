<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'email',
        'mot_de_passe',
        'adresse',
        'date_creation',
        'id_role',
    ];

    protected $hidden = [
        'mot_de_passe',
        'remember_token',
    ];

    protected $casts = [
        'date_creation' => 'datetime',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'id_role', 'id_role');
    }

    public function commandes(): HasMany
    {
        return $this->hasMany(Commande::class, 'id_user', 'id_user');
    }

    public function avis(): HasMany
    {
        return $this->hasMany(Avis::class, 'id_user', 'id_user');
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, 'id_user', 'id_user');
    }
}