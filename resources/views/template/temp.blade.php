
	
	<!DOCTYPE html>
	<html lang="en">
		<head>
			{{-- google --}}
			<meta name="google-site-verification" content="dll6V8fXchqC6dEKYzRwhfcNnG21fXbtOGr3IPwC6F4" />
			{{-- : indique l'encodage de caractères utilisé sur la page. --}}
			<meta charset="UTF-8">
			{{-- permet de définir le viewport (zone d'affichage) pour les appareils mobiles. --}}
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			{{-- décrit brièvement le contenu du site pour les moteurs de recherche. --}}
			<meta name="description" content="Nous sommes Actu-AI, un site web d'actualités sur l'intelligence artificielle. Notre mission est de fournir des informations précises et à jour sur les dernières avancées de l'IA.">
			{{-- spécifie les mots clés liés au contenu du site pour les moteurs de recherche. --}}
			<meta name="keywords" content="AI,IA,informatique,ITU,CedricRandriamanjaka">
			{{-- indique le nom de l'auteur du contenu. --}}
			<meta name="author" content="ActuAi">
			{{-- permet de spécifier si les robots des moteurs de recherche doivent indexer et suivre le site. --}}
			<meta name="robots" content="index, follow">
			{{-- permet de spécifier si les robots des moteurs de recherche ne doivent pas indexer et suivre le site. --}}
			{{-- <meta name="robots" content="noindex, nofollow"> --}}
			{{-- ndique la fréquence à laquelle les moteurs de recherche doivent revisiter le site. --}}
			{{-- <meta name="revisit-after" content="7 days"> --}}
			{{-- spécifie le titre de l'article pour les réseaux sociaux. --}}
			<meta name="og:title" content="ActuAi">
			{{-- spécifie la description de l'article pour les réseaux sociaux. --}}
			<meta name="og:description" content="ActuAI">
			{{-- spécifie l'image de l'article pour les réseaux sociaux. --}}
			{{-- <meta name="og:image" content="@yield('image')"> --}}


			<link href="{{ secure_asset('assets/styles3.css') }}" rel="stylesheet" />
			<link rel="icon" type="image/png" href="{{ secure_asset('ioicone.png') }}">

			<title>ActuAI - @yield('titre')</title>
		</head>
		<body>
			<!-- Navigation-->
			<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
				<div class="container px-4 px-lg-5">
					<a class="navbar-brand" href="{{ route('index') }}">Actu-AI</a>
					<div class="collapse navbar-collapse" id="navbarResponsive">
						<ul class="navbar-nav ms-auto py-4 py-lg-0">
							<li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('login') }}">Auteur</a></li>
							<li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('about') }}">About</a></li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="BODY">@yield('BODY')</div>

			<!-- Footer-->
			<footer class="bg-light text-dark">
				<div class="container py-5">
					<div class="row">
						<div class="col-md-6">
							<h5 class="mb-3">About Us</h5>
							<p>Nous sommes Actu-AI, un site web d'actualités sur l'intelligence artificielle. Notre mission est de fournir des informations précises et à jour sur les dernières avancées de l'IA.</p>
						</div>
						<div class="col-md-2"></div>
						<div class="col-md-4">
							<h5 class="mb-3">Contact Us</h5>
							<p>Email : contact@actu-ai.com</p>
							<p>Téléphone : +33 1 23 45 67 89</p>
							<p>Adresse : 123 Rue du Faubourg Saint-Honoré, Antananarivo, Madagascar</p>
						</div>
					</div>
				</div>
				<div class="border-top py-3">
					<div class="container text-center">
						<p class="small mb-0">&copy; Actu-AI Website 2023</p>
					</div>
				</div>
			</footer>
			
			<!-- Core theme JS-->
			<script src="{{ secure_asset('assets/scripts.js') }}"></script>
		</body>
	</html>
	