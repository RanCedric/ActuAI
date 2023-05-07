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
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/temp', [HomeController::class, 'temp'])->name('temp');

Route::get('/login', [AuteurController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuteurController::class, 'login'])->name('login.post');

Route::post('/article', [ArticleController::class, 'saveArticle'])->name('articles.save');
Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('updateArticle');
Route::get('/articles/{article}', [ArticleController::class,'show'])->name('article.show');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/articles/image/{id}', [ArticleController::class, 'afficherImage'])->name('article.image');

    Route::get('/accueil-auteur', [AuteurController::class, 'showAccueil'])->name('acceuilAuteur')->middleware('auteur');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('modifierArticle')->middleware('auteur');
    Route::get('/creerarticle', function () {
        return view('cree');
    })->name('creerArticle')->middleware('auteur');
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('deleteArticle')->middleware('auteur');
