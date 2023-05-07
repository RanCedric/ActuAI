
	
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<link href="{{ asset('assets/styles3.css') }}" rel="stylesheet" />
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
			<script src="{{ asset('assets/scripts.js') }}"></script>
		</body>
	</html>
	