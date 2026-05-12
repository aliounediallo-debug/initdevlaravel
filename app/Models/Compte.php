<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Compte extends Model
{
    protected $primaryKey = 'id_compte';

    protected $fillable = [
        'role_id',
        'id_type',
        'numero_compte',
        'type_compte',
        'solde',
        'devise',
        'statut',
        'is_verified',
        'date_creat',
    ];

    protected $casts = [
        'solde'       => 'decimal:2',
        'is_verified' => 'boolean',
        'date_creat'  => 'datetime',
    ];

    // ─── Relations ───────────────────────────────────────────────

    /**
     * Un compte appartient à un rôle.
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'id_role');
    }

    /**
     * Un compte appartient à un type (client ou partenaire).
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'id_type', 'id_type');
    }

    /**
     * Un compte est détenu par un seul utilisateur (1:1).
     */
    public function utilisateur(): HasOne
    {
        return $this->hasOne(Utilisateur::class, 'compte_id', 'id_compte');
    }

    /**
     * Transactions effectuées DEPUIS ce compte (source).
     */
    public function transactionsEnvoyees(): HasMany
    {
        return $this->hasMany(Transaction::class, 'compte_id', 'id_compte');
    }

    /**
     * Transactions reçues SUR ce compte (destination).
     */
    public function transactionsRecues(): HasMany
    {
        return $this->hasMany(Transaction::class, 'compte_destination_id', 'id_compte');
    }

    // ─── Helpers ─────────────────────────────────────────────────

    public function isClient(): bool
    {
        return $this->type_compte === 'client';
    }

    public function isPartenaire(): bool
    {
        return $this->type_compte === 'partenaire';
    }

    public function isActif(): bool
    {
        return $this->statut === 'actif';
    }
}
