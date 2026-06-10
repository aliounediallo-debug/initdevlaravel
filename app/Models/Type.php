<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    protected $primaryKey = 'id_type';

    protected $fillable = [
        'nom', // 'client' | 'partenaire'
    ];

    // ─── Relations ───────────────────────────────────────────────

    /**
     * Un type peut être lié à plusieurs comptes.
     */
  public function comptes()
    {
        return $this->hasMany(Compte::class);
    }
}
