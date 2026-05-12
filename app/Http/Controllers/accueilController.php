<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class AccueilController extends Controller
{
    public function index()
    {
    $transactions = Transaction::latest()->take(5)->get();
    $solde = Transaction::sum('amount');

    return view('accueil', compact('transactions', 'solde'));
    }
    public function accueil()
    {

    return view('accueil');
    }

}
