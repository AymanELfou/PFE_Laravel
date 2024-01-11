@extends('Master_page')
@section('title','Edit Product')

@section('content')
<header>
    <style>
        body{
            background-color: grey;
        }
    </style>
</header>

<div class="container justify-content-center mt-3">
    @include('incs.flash')
</div>
<i><h2 class="text-center" style="color: yellow; text-decoration: underline; font-family: Verdana, Geneva, Tahoma, sans-serif;"> Modifier un Produit:</h2></i>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card m-3" style="border-radius: 11px;">
                    

                    <div class="card-body">
                        <form method="POST" action="{{route('update',$produit->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")


                            <div class="form-group">
                                <label for="nom"><h5>{{ __('Nom du produit:') }}</h5></label>
                                <input id="nom" type="text" class="form-control" value="{{$produit->nom}}" name="nom">
                                    @error('nom')
                                       {{ $message }}
                                    @enderror
                            </div>

                            <div class="form-group">
                                <label for="prix"><h5>{{ __('Prix du produit:') }}</h5></label>
                                <input id="prix" type="text" class="form-control" value="{{$produit->prix}}" name="prix">
                                @error('prix')
                                   {{ $message }}
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="categorie"><h5>{{ __('Catégorie du produit:') }}</h5></label>
                                <input id="categorie" type="text" class="form-control" value="{{$produit->categorie}}" name="categorie">
                                @error('categorie')
                                       {{ $message }}
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="image"><h5>{{ __('Image du produit:') }}</h5></label>
                                <input id="image" type="file" class="form-control-file"  name="image">
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary w-100">
                                    <b>{{ __('Modifier') }}</b>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



<!-- Inclure jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Inclure les fichiers JavaScript de Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>

