<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $key = 'articles.' . request('page', 1);
        $minutes = 60;

        $articles = Cache::remember($key, $minutes, function () {
            return Article::orderBy('updated_at', 'desc')->simplePaginate(5);
        });

        // a utiliser si local
        // $articles = Article::orderBy('updated_at', 'desc')->simplePaginate(5);
        return view('welcome', compact('articles'));
    }

    public function temp()
    {
        return view('temp');
    }
}