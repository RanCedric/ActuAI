

@extends('template.temp') 
@section('titre', 'Acceuil') 

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
<header class="masthead" style="background-image: url('img/fond.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Actu-Ai</h1>
                    <span class="subheading">Découvrez le monde de l'intelligence artificielle avec nous.</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            @foreach($articles as $article)
            <!-- Post preview-->
            <div class="post-preview">
                <a href="{{ route('article.show', ['article' => $article]) }}">
                    <h2 class="post-title">{{ $article->titre }}</h2>
                    {{-- <img src="{{ asset("images/$article->image") }}" alt="Image de l'article"> --}}
                    @if ($article->image)
                    <img src="{{ asset(route('article.image', ['id' => $article->id])) }}" alt="Image">
                    @endif
                    <h3 class="post-subtitle">{!! Str::words($article->contenu, 20, '...') !!}</h3>
                </a>
                <p class="post-meta">
                    Poster par
                    <a href="#!">{{ $article->auteur->nom }} {{ $article->auteur->prenom }}</a>
                    le {{ $article->created_at->format('d M Y') }}
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            
            @endforeach

            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4">{{ $articles->links() }}</div>
        </div>
    </div>
</div>

            
                    
{{-- 
<form action="{{ route('image') }}" method="POST" enctype="multipart/form-data">
    @csrf
<input type="file" name="image">
<input type="submit" value="Envoyer">
</form> --}}

@endsection