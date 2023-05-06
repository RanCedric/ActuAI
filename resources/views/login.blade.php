@extends('template.temp') 
@section('titre', 'Vous') @section('BODY')

<!-- Page Header-->
<header class="masthead" style="background-image: url('{{ asset("img/33.jpg") }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Auteur</h1>
                    <span class="subheading">Connectez-vous pour accéder à votre compte d'auteur et partager vos histoires avec le monde entier.</span>
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
                <h1>Connection</h1>
                <div class="my-5">
                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf
                    
                        <div class="form-floating mb-3">
                            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                            <label for="email">Adresse email :</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="form-floating mb-3">
                            <input class="form-control @error('mot_de_passe') is-invalid @enderror" id="mot_de_passe" type="password" name="mot_de_passe" required>
                            <label for="mot_de_passe">Mot de passe :</label>
                            @error('mot_de_passe')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div>
                            <button class="btn btn-primary text-uppercase" type="submit">Se connecter</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</main>

@endsection