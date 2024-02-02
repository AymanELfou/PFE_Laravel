<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf; // Utilisation de la facade Pdf pour DomPDF
use Illuminate\Http\Request;

class ProduitController extends Controller
{




    // Méthode pour afficher la page d'accueil avec une pagination de produits
    public function home(){

        // Récupération des produits avec une pagination de 3 produits par page
        $produits = Product::paginate(3);
        // Retourne la vue 'AllProduct' avec les produits paginés
        return view('AllProduct',['products' => $produits]);
    }







    // Méthode pour récupérer les produits par catégorie
    public function getProdByCat(Request $req ){

        // Récupération de la catégorie depuis la requête
        $cat = $req->route('cat');
        // Récupération des produits qui ont la catégorie spécifiée
        $produits = Product::where('categorie', "=" ,$cat)->get();
        // Retourne la vue 'Produits' avec les produits de la catégorie spécifiée
        return view('Produits', [
            'products' => $produits,
            'categorie' => $cat
        ]);
    }






    // Méthode pour générer un catalogue PDF des produits en solde


    public function cataloguepdf(){
        
        // Récupérer les produits avec un solde égal à 1
        $product = Product::where('solde', 1)->get();
        // Données à passer à la vue du PDF
        $data = [
            'products' => $product
        ];
        // Générer le PDF à partir de la vue 'catalogue' avec les données spécifiées
        $pdf = Pdf::loadView('catalogue', $data);
        // Télécharger le PDF
        return $pdf->stream();
    }
}
