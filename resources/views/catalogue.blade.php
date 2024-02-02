<h1 class="text center" style="color: orange;">Notre Catalogue </h1>
<h2> Liste des Prduits: </h2>

<table class="table" border="1" style="width: 100%;">
    <thead>
      <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prix</th>

      </tr>
    </thead>
    <tbody>

@foreach ($products as $item)
    <tr>
        <td>{{$item['nom']  }}</td>
        <td>{{$item['prix']  }}DH</td>
    </tr>

@endforeach


        </tbody>
</table>
