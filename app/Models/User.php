<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id_utilisateur';

    protected $fillable = [
        'compte_id',
        'nom',
        'prenom',
        'email',
        'password',
        'telephone',
        'adresse',
        'type',
        'date_naissance',
        'pays',
        'numero_piece',

        'raison_sociale',
        'taux_commission',
        'logo',
        'date_creat',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'date_naissance'    => 'date',
        'date_creat'        => 'datetime',
        'taux_commission'   => 'decimal:2',
        'email_verified_at' => 'datetime',
    ];


    /**
     * Un utilisateur possède un compte (1:1).
     */
    public function compte(): BelongsTo
    {
        return $this->belongsTo(Compte::class, 'compte_id', 'id_compte');
    }

    /**
     * Transactions initiées par cet utilisateur.
     */
    public function roles (): BelongsToMany
    {
        return $this->belongtomamy(Role::class);
    }


}
