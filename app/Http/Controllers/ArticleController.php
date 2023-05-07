<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ArticleController extends Controller
{

public function saveArticle(Request $request)
{
    $validatedData = $request->validate([
        'titre' => 'required|max:255',
        'contenu' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Récupérer le fichier image depuis la requête
    $file = $request->file('image');

    // Créer une instance de GuzzleHttp\Client
    $client = new Client();

    try {
        // Envoyer une requête POST pour héberger l'image sur un serveur tiers
        $response = $client->post('https://api.imgur.com/3/image', [
            'multipart' => [
                [
                    'name'     => 'image',
                    'contents' => fopen($file->getPathname(), 'r'),
                    'filename' => $file->getClientOriginalName()
                ],
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . env('API_KEY'),
            ],
        ]);

        // Récupérer l'URL de l'image hébergée depuis la réponse de la requête
        $imageUrl = $response->getBody()->getContents();

        // Enregistrer l'article avec l'URL de l'image
        $article = new Article;
        $article->titre = $validatedData['titre'];
        $article->contenu = $validatedData['contenu'];
        $article->image = $imageUrl;
        $article->save();

        return redirect('/')->with('success', 'L\'article a été créé avec succès.');
    } catch (\Exception $e) {
        return redirect('/')->with('error', 'Une erreur s\'est produite lors de la création de l\'article : ' . $e->getMessage());
    }
}


    public function edit(Article $article)
{
    return view('edit', compact('article'));
}

public function update(Request $request, $id)
{
    $article = Article::find($id);

    if (!$article) {
        return redirect()->route('acceuilAuteur')->with('error', 'Article non trouvé');
    }

    $request->validate([
        'titre' => 'required|unique:articles,titre,' . $article->id,
        'contenu' => 'required',
    ]);

    $article->titre = $request->titre;
    $article->contenu = $request->contenu;
    $article->save();

    return redirect()->route('acceuilAuteur')->with('success', 'Article mis à jour avec succès');
}

public function show(Article $article)
{
    return view('article', compact('article'));
}

public function destroy($id)
{
    $article = Article::findOrFail($id);
    $article->delete();
    return redirect()->route('acceuilAuteur');
}


}
