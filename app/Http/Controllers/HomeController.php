<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    // public function index()
    // {
    //     $key = 'articles.' . request('page', 1);
    //     $minutes = 60;

    //     $articles = Cache::remember($key, $minutes, function () {
    //         return Article::orderBy('updated_at', 'desc')->simplePaginate(5);
    //     });

    //     // a utiliser si local
    //     // $articles = Article::orderBy('updated_at', 'desc')->simplePaginate(5);
    //     return view('welcome', compact('articles'));
    // }

    public function index()
    {
        $query = request('query');
        $key = 'articles.' . request('page', 1) . '.' . $query;
        $minutes = 60;

        if ($query) {
            $articles = Cache::remember($key, $minutes, function () use ($query) {
                return Article::where('title', 'like', '%'.$query.'%')->orWhere('content', 'like', '%'.$query.'%')
                    ->orderBy('updated_at', 'desc')->simplePaginate(5);
            });
        } else {
            $articles = Cache::remember('articles.' . request('page', 1), $minutes, function () {
                return Article::orderBy('updated_at', 'desc')->simplePaginate(5);
            });
        }

        return view('welcome', compact('articles', 'query'));
    }


    public function temp()
    {
        return view('temp');
    }
}