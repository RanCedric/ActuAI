@extends('template.temp') 
@section('titre', 'Article') 

@section('BODY')
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('{{ asset(route('article.image', ['id' => $article->id])) }}')">

        {{-- <header class="masthead" style="background-image: url('{{ asset("images/$article->image") }}')"> --}}
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1>{{ $article->titre }}</h1>
                            <h2 class="subheading">{!! Str::words($article->contenu, 14, '...') !!}</h2>
                            <span class="meta">
                                Poster par
                                <a href="#!">{{ $article->auteur->nom }} {{ $article->auteur->prenom }}</a>
                                le {{ $article->created_at->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        {!! $article->contenu !!}
                    </div>
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <img src="{{ asset(route('article.image', ['id' => $article->id])) }}" class="img-fluid" alt="{{ $article->titre }}" />
                    </div>
                    
                </div>
            </div>
        </article>
        @endsection