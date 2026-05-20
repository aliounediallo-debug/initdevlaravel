<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
     * Un rôle peut être attribué à plusieurs utilisateurs.
     */
    public function users():BelongsToMany{
        return $this->belongstomany(User::class);
    }


}
