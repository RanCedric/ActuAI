<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function saveArticle(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'contenu' => 'required',
            'image' => 'required|image|mimes:jpg|max:2048',
        ]);

        // Récupérer le fichier image depuis la requête
        $file = $request->file('image');

        // Déterminer l'extension du fichier
        $extension = $file->getClientOriginalExtension();

        // Enregistrer l'image dans la base de données
        $article = new Article;
        $article->titre = $validatedData['titre'];
        $article->contenu = $validatedData['contenu'];
        $article->image_type = $extension;
        $article->image = base64_encode(file_get_contents($file)); // Encodage de l'image en base64

        // Ajouter l'ID de l'auteur à l'article
        $article->auteur_id = session('auteur')->id;

        $article->save();
        //echo '<img src="data:'.$article->image_type.';base64,'.$article->image.'">';
        return redirect('/accueil-auteur')->with('success', 'L\'article a été créé avec succès.');
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

    public function afficherImage($id)
    {
        $article = Article::findOrFail($id);

        // Vérifier si l'image existe
        if (!$article->image) {
            abort(404);
        }

        // Récupérer le contenu de l'image depuis la base de données
        $imageData = base64_decode($article->image); // Décodage de l'image base64

        // Définir les en-têtes de réponse
        $headers = [
            'Content-Type' => $article->image_type,
            'Content-Length' => strlen($imageData),
            'Cache-Control' => 'public, max-age=86400',
        ];

        // Renvoyer la réponse
        return response($imageData, 200, $headers);
    }


}