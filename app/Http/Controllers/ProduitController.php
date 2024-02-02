<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
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


    public function cataloguepdf(){
        // Récupérer les produits avec un solde égal à 1

        $product = Product::where('solde',1)->get();

        $data = [
            'products' => $product
        ];

        // Générer le PDF
        $pdf =Pdf::loadView('catalogue',$data);

        // Télécharger le PDF
        return $pdf->stream();

    }
}
