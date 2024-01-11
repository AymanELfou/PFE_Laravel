@extends('Master_page')
@section('title','Add Produit')


@section('content')
<h2 class="text-center mt-2"> Add New Product:</h2>

<div class="container justify-content-center mt-3">
    @include('incs.flash')
</div>

<div class="container">
<!-- Le formulaire et l'action -->
<form method="POST" action="/produits" enctype="multipart/form-data">

	<!-- Le champ "nom" -->
	<div class="mb-3" >
		<label class="form-label" for="name" >Nom du produit</label>

		<!-- Classe CSS "is-invalid" si erreur pour "name" -->
		<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="nom" placeholder="Nom complet" >

		<!-- Le message d'erreur -->
		@error('nom')
		<div class="invalid-feedback">{{ $message }}</div>
		@enderror

	</div>

	<!-- Le champ prix -->
	<div class="mb-3" >
		<label class="form-label" for="email" >Prix du produit</label>

		<!-- Classe CSS "is-invalid" si erreur pour "email" -->
		<input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="prix" placeholder="Prix de Produit" >

		<!-- Le message d'erreur -->
		@error('prix')
		<div class="invalid-feedback">{{ $message }}</div>
		@enderror

	</div>

    <!-- Le champ categorie -->
	<div class="mb-3" >
		<label class="form-label" for="email" >Catégorie du produit</label>

		<!-- Classe CSS "is-invalid" si erreur pour "email" -->
		<input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="categorie" placeholder="Categorie de Produit" >

		<!-- Le message d'erreur -->
		@error('categorie')
		<div class="invalid-feedback">{{ $message }}</div>
		@enderror

	</div>


    <!-- Le champ categorie -->
	<div class="mb-3" >
		<label class="form-label" for="image" >Image du produit</label>

		<!-- Classe CSS "is-invalid" si erreur pour "email" -->
		<input type="file" class="form-control @error('email') is-invalid @enderror" id="image" name="image"  >

		<!-- Le message d'erreur -->
		@error('image')
		<div class="invalid-feedback">{{ $message }}</div>
		@enderror

	</div>

	<!-- Champ CSRF -->
	@csrf

	<!-- Le bouton pour valider -->
	<button type="submit" class="btn btn-success" >Ajouter</button>
	
</form>
</div>
@endsection



<!-- Inclure jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Inclure les fichiers JavaScript de Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
