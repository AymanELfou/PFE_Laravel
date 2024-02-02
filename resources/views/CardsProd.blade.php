@extends('Master_page')
@section('title','Buy Products')

@section('content')

<div class="container mt-5">
    @include('incs.flash')
    <div class="row">
        @foreach($products as $item)
            <div class="col-xs-12 col-sm-6 col-md-4" style="margin-top: 10px;">
                <div class="card text-center">
                    <img src="{{ asset('imgs/'.$item['image']) }}" class="card-img-top" style="width: 300px; height: 250px;" alt="{{ $item['nom'] }}">
                    <div class="card-body">
                        <h4 class="card-title">{{ $item['nom'] }}</h4>
                        <p class="card-text"><i>{{ $item['nom'] }}</i></p>
                        <p class="card-text"><strong>Price:</strong> {{ $item['prix'] }} DH</p>
                        <a href="{{ route('add_to_cart', $item->id) }}" class="btn btn-danger btn-block" role="button">Add to Cart</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection