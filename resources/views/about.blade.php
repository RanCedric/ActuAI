@extends('template.temp') 
@section('titre', 'Nous') @section('BODY')

<!-- Page Header-->
<header class="masthead" style="background-image: url('{{ asset("img/33.jpg") }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>About Us</h1>
                    <span class="subheading">Découvrez notre parcours et notre passion pour l'intelligence artificielle</span>
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
                <div class="card border-0 shadow">
                    <div class="card-body p-4 p-lg-5">
                        <h2 class="display-5 text-center mb-4">À propos de nous</h2>
                        <p class="lead mb-4">Nous sommes Actu-AI, un site web d'actualités sur l'intelligence artificielle. Notre mission est de fournir des informations précises et à jour sur les dernières avancées de l'IA.</p>
                        <p class="lead mb-4">Notre équipe est composée de passionnés de l'IA, tous experts dans leur domaine. Nous avons des rédacteurs en chef, des journalistes, des analystes de données et des développeurs web, tous travaillant ensemble pour créer un site d'actualités de premier ordre.</p>
                        <p class="lead mb-4">Vous pouvez nous contacter à tout moment à l'adresse suivante :</p>
                        <ul class="list-unstyled mb-4">
                            <li><i class="bi bi-envelope me-2"></i>Email : contact@actu-ai.com</li>
                            <li><i class="bi bi-telephone me-2"></i>Téléphone : +33 1 23 45 67 89</li>
                            <li><i class="bi bi-geo-alt me-2"></i>Adresse : 123 Rue du Faubourg Saint-Honoré, Paris, France</li>
                        </ul>
                        <p class="lead mb-4">Nous sommes fiers de fournir des informations de qualité sur l'IA à nos lecteurs, et nous sommes reconnaissants de votre soutien.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

                    
            

@endsection