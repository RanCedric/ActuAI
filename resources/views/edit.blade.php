
        


@extends('template.temp') 
@section('titre', 'Edit') @section('BODY')
  
<script src="{{ secure_asset('ckeditor.js') }}"></script>

<!-- Page Header-->
<header class="masthead" style="background-image: url('{{ asset(route('article.image', ['id' => $article->id])) }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Auteur</h1>
                    <span class="subheading">Modifer votre article ICI.</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h1>Modification de l Article :</h1>
                <h4>"{{ $article->titre }}"</h4>
                <div class="my-5">
                    <form method="POST" action="{{ route('updateArticle', $article->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-floating mb-3">
                            <input class="form-control" id="titre" name="titre" value="{{ $article->titre }}" required autofocus>
                            <label for="titre">Titre</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <label for="">Contenu</label>
                            <textarea id="contenu" name="contenu">{{ $article->contenu }}</textarea>
                        </div>

                        <div>
                            <button class="btn btn-primary text-uppercase" type="submit">Modifer</button>
                            
                        </div>
                    </form>
                </div>
                <div class="card border-danger mb-3">
                    <div class="card-header bg-danger text-white">Supprimer l'article</div>
                    <div class="card-body">
                        <h1 class="card-title">Suppression de l'article :</h1>
                        <h4>"{{ $article->titre }}"</h4>
                        <div class="my-5">
                            <form method="POST" action="{{ route('deleteArticle', $article->id) }}">
                                @csrf
                                @method('DELETE')
                                <p class="mb-3">Êtes-vous sûr de vouloir supprimer cet article ?</p>
                                <div>
                                    <button class="btn btn-danger text-uppercase" type="submit">Supprimer</button>
                                    <a class="btn btn-secondary text-uppercase" href="{{ route('acceuilAuteur') }}">Annuler</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<script>
    ClassicEditor
    .create(document.querySelector('#contenu'))
    .catch(error => {
        console.error(error);
    })
</script>

@endsection

