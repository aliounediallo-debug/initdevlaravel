<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return response()->json(
            Transaction::all()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'compte_id' => 'required',
            'compte_destination_id' => 'required',
            'montant' => 'required|numeric|min:1'
        ]);

        $transaction = Transaction::create([
            'compte_id' => $request->compte_id,
            'compte_destination_id' => $request->compte_destination_id,
            'montant' => $request->montant,
            'type' => 'transfert',
            'statut_transaction' => 'effectue'
        ]);

        return response()->json([
            'message' => 'Transfert effectué',
            'transaction' => $transaction
        ], 201);
    }
}
