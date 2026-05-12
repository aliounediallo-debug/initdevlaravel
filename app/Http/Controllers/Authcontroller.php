<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
     // Formulaire login
    public function loginForm()
    {
        return view('authentification.login');
    }

    // Traitement login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'telephone' =>'required|min:9|max:9',
            'password' => 'required|min:6'

        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('accueil');
        }

        return back()->withErrors([
            'telephone' => 'Téléphone ou mot de passe incorrect'
        ]);
    }
}
