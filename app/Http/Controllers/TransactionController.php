<?php

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function accueil()
{
    $transactions = Transaction::latest()->take(5)->get();

    $solde = Transaction::sum('amount');

    return view('accueil', compact('transactions', 'solde'));
}
    // afficher historique
    public function index()
    {
        $transactions = Transaction::latest()->get();
        return view('history', compact('transactions'));
    }

    // afficher formulaire
    public function create()
    {
        return view('send');
    }

    // enregistrer transaction
    public function store(Request $request)
    {
        Transaction::create([
    'name' => $request->name,
    'phone' => $request->phone,
    'amount' => -$request->amount, // envoi = négatif
    'type' => 'envoi'
    ]);

        return redirect('/history')->with('success','Transaction réussie');
    }
}
