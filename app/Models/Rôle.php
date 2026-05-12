<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    protected $primaryKey = 'id_role';

    protected $fillable = [
        'nom_role',
        'description',
        'permissions',
        'date_creat',
    ];

    protected $casts = [
        'permissions' => 'array',
        'date_creat'  => 'datetime',
    ];

    // ─── Relations ───────────────────────────────────────────────

    /**
     * Un rôle peut être attribué à plusieurs comptes.
     */
    public function comptes(): HasMany
    {
        return $this->hasMany(Compte::class, 'role_id', 'id_role');
    }
}
