<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function home(){
        return view("Home");
    }


    public function getProdByCat(Request $req ){
        $cat = $req->route('cat');

        $produits = Product::where('categorie', "=" ,$cat)->get();

        return view('Produits', [
            'products' => $produits,
            'categorie' => $cat
            ]);
    }
}
