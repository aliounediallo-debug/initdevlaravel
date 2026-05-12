<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InscripController extends Controller
{
    // Afficher formulaire
    public function inscriptionForm()
    {
        return view('authentification.inscription');
    }

    // Enregistrer utilisateur
    public function inscription(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' =>'required|min:9|max:9'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telephone' => $request->phone,
        ]);

        return redirect('/accueil')->with('success', 'Compte créé avec succès');
    }
}


