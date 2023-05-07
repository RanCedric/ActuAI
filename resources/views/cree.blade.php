@extends('template.temp') 
@section('titre', 'Ajout') @section('BODY')
  
<script src="{{ asset('ckeditor.js') }}"></script>

<!-- Page Header-->
<header class="masthead" style="background-image: url('{{ asset("img/33.jpg") }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Auteur</h1>
                    <span class="subheading">Cree votre article ICI.</span>
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
                <h1>Nouveau Article</h1>
                <div class="my-5">
                    <form method="POST" action="{{ route('articles.save') }}" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="form-floating mb-3">
                            <input class="form-control" id="titre" name="titre" required autofocus>
                            <label for="titre">Titre</label>
                        </div>
                    
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>

                        <div class="form-floating mb-3">
                            <label for="">Contenu</label>
                            <textarea id="contenu" name="contenu" style="heigth:1000px;"></textarea>
                        </div>

                        <div>
                            <button class="btn btn-primary text-uppercase" type="submit">Publier</button>
                        </div>
                    </form>
                    
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

