<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function saveArticle(Request $request)
{
    $request->validate([
        'titre' => 'required|unique:articles',
        'contenu' => 'required',
        'image' => 'image|max:12288', // Taille maximale de 12 Mo
    ]);

    $article = new Article();
    $article->titre = $request->titre;
    $article->contenu = $request->contenu;
    $auteur = $request->session()->get('auteur');
    $article->auteur_id = $auteur->id;

    // Gestion de l'image
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $nom_image = time() . '_' . str_replace(' ', '_', $image->getClientOriginalName());
        $image->move(public_path('images'), $nom_image);
        $article->image = $nom_image;
    }

    $article->save();

    return redirect()->route('acceuilAuteur')->with('success', 'Article ajouté avec succès');
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
