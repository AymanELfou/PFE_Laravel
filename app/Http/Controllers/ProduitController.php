<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function home(){
        
        $produits = Product::paginate(3);
        return view('AllProduct',['products' => $produits]);

        // OR: return view('AllProduct',compact('produits'));

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
