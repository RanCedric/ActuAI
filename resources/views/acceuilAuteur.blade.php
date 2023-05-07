@extends('template.temp') 
@section('titre', 'Auteur') 
@section('BODY')

<style>
    .post-preview img {
    width: 100%;
    height: 100px;
    object-fit: cover;
    object-position: center;
}
</style>

<!-- Page Header-->
<header class="masthead" style="background-image: url('img/fond.jpg'); height: 300px;">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>vos Publications</h1>
                    <span class="subheading">liste de vos Articles , Cliquer sur un article pour le modifier.</span>
                </div>
            </div>
        </div>
    </div>
</header> 
<a href="{{ route('creerArticle') }}" class="btn btn-primary" style="position: fixed; bottom: 20px; right: 20px;">Créer un article</a>

<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            @if($articles->count() > 0)
                @foreach($articles as $article)
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{ route('modifierArticle', ['article' => $article]) }}">
                            <h2 class="post-title">{{ $article->titre }}</h2>
                            <img src="{{ asset(route('article.image', ['id' => $article->id])) }}" alt="Image de l'article">
                            <h3 class="post-subtitle">{!! Str::words($article->contenu, 20, '...') !!}</h3>
                        </a>
                        <p class="post-meta">
                            Poster le {{ $article->created_at->format('d M Y') }}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                @endforeach
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4">{{ $articles->links() }}</div>
            @else
                <div class="alert alert-warning" role="alert">
                    Aucun article à afficher pour le moment.
                    <a href="{{ route('creerArticle') }}">Proposer un nouvel article</a>
                </div>
            @endif
        </div>
    </div>
</div>


@endsection    