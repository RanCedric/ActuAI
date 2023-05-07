<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuteurController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\Auteur;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/temp', [HomeController::class, 'temp'])->name('temp');
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/login', [AuteurController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuteurController::class, 'login'])->name('login.post');
Route::post('/article', [ArticleController::class, 'saveArticle'])->name('articles.save');
Route::get('/accueil-auteur', [AuteurController::class, 'showAccueil'])->name('acceuilAuteur');
//Route::get('/modifier-article/{article}', [ArticleController::class, 'edit'])->name('modifierArticle');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('modifierArticle');
Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('updateArticle');
Route::get('/articles/{article}', [ArticleController::class,'show'])->name('article.show');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/creerarticle', function () {
    return view('cree');
})->name('creerArticle');

Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('deleteArticle');

Route::get('/articles/image/{id}', [ArticleController::class, 'afficherImage'])->name('article.image');


// Route::post('/image', function (Illuminate\Http\Request $request) {
//     // Valider les données du formulaire
//     $request->validate([
//         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
//     ]);

//     // Convertir l'image en base64
//     $image = $request->file('image');
//     $base64_image = base64_encode(file_get_contents($image));

//     // Afficher la base64 dans une balise label
//     echo "<label>$base64_image</label>";

//     // Reconvertir la base64 en image et l'afficher dans une balise img
//     echo '<img src="data:'.$image->getClientMimeType().';base64,'.$base64_image.'">';
// })->name('image');