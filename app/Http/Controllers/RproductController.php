<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddArticleRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class RproductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits=Product::paginate(3);
        return view('home', ['products' => $produits ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Addprod');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddArticleRequest $request)
    {
        $request->validated();

         // récupérer les valeurs des champs :
         $nom=$request->input('nom');
         $prix=$request->input('prix');
         $categorie=$request->input('categorie');
         $image=$request->file('image')->getClientOriginalName();

         //Créer un objet Produit

         $Produit= new Product();

         $Produit->nom=$nom;
         $Produit->prix=$prix;
         $Produit->categorie=$categorie;
         $Produit->image=$image;

           // enregistrer dans la table articles
         $Produit->save();

           // enregistrer dans le dossier (public\images)


           $request->file('image')->move(public_path('imgs'), $image);

           return back()->with('success','You have successfully added a new Product.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produit = Product::findorFail($id);
        return view('edit',compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddArticleRequest $request, string $id)
    {
        $Produit = Product::find($id);

        $request->validated();

         // récupérer les nouvelles valeurs des champs :
        $nom = $request->nom;
        $prix = $request->prix;
        $categorie=$request->input('categorie');

        $image='';

        // update with save

        $Produit->nom=$nom;
        $Produit->prix=$prix;
        $Produit->categorie=$categorie;
        if($request->hasFile('image')){
            $image=$request->file('image')->getClientOriginalName();

            // enregistrer dans le dossier (public\images)
            $request->file('image')->move(public_path('imgs'), $image);
        }else{
            $Produit->image=$image;
        }
        $Produit->image=$image;
        
        $Produit->save();


        return back()->with('successupdate','You have successfully updated a product.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Produit=Product::find($id);


        // delete with delete

        $Produit->delete();

        return back()->with('successdelete','You have successfully deleted a product.');
    }
}
