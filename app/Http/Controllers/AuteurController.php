<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Auteur;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuteurController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'mot_de_passe' => ['required'],
        ]);

        $auteur = Auteur::where('email', $credentials['email'])
                        ->where('mot_de_passe', $credentials['mot_de_passe'])
                        ->first();

        if ($auteur) {
            Session::put('auteur', $auteur);
            return redirect()->route('acceuilAuteur');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'Les informations d\'identification sont invalides.',
        ]);
    }

    public function showAccueil(Request $request)
{
    $auteur = $request->session()->get('auteur');
    $articles = Article::where('auteur_id', $auteur->id)->simplePaginate(5);

    return view('acceuilAuteur', ['articles' => $articles]);
}

}
