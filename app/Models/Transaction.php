<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Transaction extends Model
{
    protected $primaryKey = 'id_transaction';

    protected $fillable = [
        'compte_id',
        'compte_destination_id',
        'utilisateur_id',
        'reference',
        'type',
        'montant',
        'frais',
        'devise',
        'statut_transaction',
        'motif',
        'metadata',
        'date_effectuee',
    ];

    protected $casts = [
        'montant'         => 'decimal:2',
        'frais'           => 'decimal:2',
        'montant_net'     => 'decimal:2',
        'metadata'        => 'array',
        'date_effectuee'  => 'datetime',
    ];

    // ─── Boot : génération automatique de la référence ───────────

    protected static function booted(): void
    {
        static::creating(function (Transaction $transaction) {
            if (empty($transaction->reference)) {
                $transaction->reference = strtoupper('TXN-' . now()->format('YmdHis') . '-' . Str::random(6));
            }
        });
    }

    // ─── Relations ───────────────────────────────────────────────

    /**
     * Compte source (expéditeur).
     */
    public function compteSource(): BelongsTo
    {
        return $this->belongsTo(Compte::class, 'compte_id', 'id_compte');
    }

    /**
     * Compte destination (bénéficiaire).
     */
    public function compteDestination(): BelongsTo
    {
        return $this->belongsTo(Compte::class, 'compte_destination_id', 'id_compte');
    }

    /**
     * Utilisateur ayant initié la transaction.
     */
    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id', 'id_utilisateur');
    }

    // ─── Helpers ─────────────────────────────────────────────────

    public function getMontantNetAttribute(): float
    {
        return (float) $this->montant - (float) $this->frais;
    }

    public function isCompletee(): bool
    {
        return $this->statut_transaction === 'completee';
    }

    public function isEnAttente(): bool
    {
        return $this->statut_transaction === 'en_attente';
    }

    public function marquerCompletee(): bool
    {
        return $this->update([
            'statut_transaction' => 'completee',
            'date_effectuee'     => now(),
        ]);
    }

    public function marquerEchouee(): bool
    {
        return $this->update(['statut_transaction' => 'echouee']);
    }
}
