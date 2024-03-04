@extends('Master_page') {{-- Étend le modèle de page principal --}}

@section('title','Cart') {{-- Définit le titre de la page --}}

@section('content') {{-- Section du contenu --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="container mt-5" style="background-color: #c07be0; border-radius: 18px;">
    <table id="cart" class="table table-hover">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>

        <tbody>
            @php $total=0 @endphp

            @if(session('cart'))
                @foreach ( session('cart') as $id => $details)
                    @php
                        $total += $details['price'] * $details['quantity']
                    @endphp

                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 "><img src="{{ asset('imgs/'.$details['photo']) }}" width="100" height="100" class=""/></div>
                                <div class="col-sm-9">
                                    <h4>{{ $details['name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">{{ $details['price'] }} DH</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart-update" min="1" />
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}">Modifier</button>
                            <button class="btn btn-danger btn-sm remove-from-cart delete" data-id="{{ $id }}"><i class="fa fa-trash-o"></i> Delete</button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>

        <tfoot>
            <tr>
                <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <form action="/session" method="POST">
                        <a href="{{ url('/CardsProd') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Continue Shopping</a>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" id="checkout-button" class="btn btn-success"><i class="fa fa-money"></i> Checkout <i class="fas fa-file-invoice-dollar"></i></button>
                    </form>
                </td>

                <!-- <td>
                    <form action="/session" method="POST">
                        <a href="{{ url('/CardsProd') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Continue Shopping</a>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" id="checkout-button" class="btn btn-continue-shopping">Payer <i class="fas fa-file-invoice-dollar"></i></button>
                    </form>

                </td> -->
            </tr>
        </tfoot>
    </table>
</div>
@endsection {{-- Fin de la section du contenu --}}

@section('scripts') {{-- Section pour les scripts --}}

<script>
    // Script pour mettre à jour le panier via AJAX
    $(".update-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ url("update-cart") }}',
            method: "patch",
            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
            success: function (response) {
                window.location.reload(); // Recharge la page après la mise à jour
            }
        });
    });

    // Script pour supprimer un élément du panier via AJAX
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Are you sure")) {
            $.ajax({
                url: '{{ url('remove-from-cart') }}',
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                success: function (response) {
                    window.location.reload(); // Recharge la page après la suppression
                }
            });
        }
    });
</script>

@endsection {{-- Fin de la section des scripts --}}
