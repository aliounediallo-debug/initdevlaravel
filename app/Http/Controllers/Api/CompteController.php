<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Compte;

class CompteController extends Controller
{
    public function index()
    {
        return response()->json(
            Compte::with('user')->get()
        );
    }

    public function show($id)
    {
        $compte = Compte::with([
            'user',
            'transactionsEnvoyees',
            'transactionsRecues'
        ])->findOrFail($id);

        return response()->json($compte);
    }
}
