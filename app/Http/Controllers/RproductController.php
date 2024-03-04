<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddArticleRequest;
use App\Models\Product;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class RproductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits=Product::paginate(3);
        return view('AllProduct', ['products' => $produits ]);
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

    public function client(){
        return view("espaceclient");
    }

    public function Contact(){
        return view("contact.show");
    }





             //--------------- Cart methods --------------:



    public function showcards(){

        $products=Product::all();
        return view("CardsProd",compact('products'));
    }




    public function cart(){
        return view("cart");
    }






    public function addTocart($id){

        $product=Product::find($id);

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart){
            $cart = [
                $id =>[
                    "name"=>$product->nom,
                    "quantity" => 1,
                    "price" => $product->prix,
                    "photo" => $product->image
                ]
            ];

            session()->put('cart',$cart);

            return redirect()->back()->with('success', 'added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])){

            $cart[$id]['quantity']++;

            session()->put('cart',$cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }


        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->nom,
            "quantity" => 1,
            "price" => $product->prix,
            "photo" => $product->image
        ];

        session()->put('cart', $cart); // this code put product of choose in cart

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }






    // Update Cart:

    public function updateCrt(Request $request){

        if($request->id and $request->quantity){
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart',$cart);

            session()->flash('success', 'Cart updated successfully');

            return response()->json(['success' => true]);
        }

        
    }






    // Remove Product of Cart:

    public function removeCrt(Request $request){

        if($request->id){
            $cart = session()->get('cart');

            if(isset($cart[$request->id])){

                unset($cart[$request->id]);
                
                session()->put('cart',$cart);
            }

            session()->flash('success', 'Product removed successfully');

        }

        
    }



    public function email()
    {
        return view('contact.show');
    }

    public function sendEmail(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'content' => $request->input('content'),
        ];

        // Envoyer l'e-mail en utilisant la classe Mailable
        Mail::to($data['email'])->send(new ContactMail($data));

        return back()->with('success','Email sent successfully!');
        
    }

}
