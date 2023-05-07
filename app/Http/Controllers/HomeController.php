<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('updated_at', 'desc')->simplePaginate(5);
        return view('welcome', compact('articles'));
    }

    public function temp()
    {
        return view('temp');
    }
}