<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::fallback( function () {
    return view('err');
}); 


/* Route::get('/env', function () {    
    dd(env('DB_USERNAME'));
}); */

/* Route::get('/{id}',
 function ($id){  
    return '<h1> Hello '.$id.' </h1>';
}); */

/* Route::prefix('admin')->group (function () {
    Route::get('categories', function () {
                 return 'categories';                     });
     Route::get('articles', function () {
                 return ['a1','a2','a3'];                     });
}); */


Route::get('/', function () {
    return view('Home');
});

Route::get('/produits/{cat}',function($cat){
    $produits=[];

    if($cat=="Casque"){
        $produits=array(
            array(
                "nom"=>"Casque Gaming JBL Quantum",
                "prix"=>499,
                "image" => "Casque-Gaming-JBL.webp"
            ),
            array(
                "nom"=>"ASUS ROG RGB Gaming Headset",
                "prix"=>799,
                "image" => "Asus.jpg"
            ),
            array(
                "nom"=>"Razer Kraken Casque Gaming USB ",
                "prix"=>949,
                "image" => "razer_.jpg"
            ),
        );
    }
    else if($cat=='Souris'){
       $produits=array(
            array(
                "nom" => "Souris Gamer Razer",
                "prix"=>599,
                "image" => "souris_razer.jpg"
            ),
            array(
                "nom" => "Souris Gamer ASUS                ",
                "prix"=>699,
                "image" => "asusSouris.webp"
            ),
            array(
                "nom" => "RisoPhy Souris Gamer sans Fil",
                "prix"=>299,
                "image" => "rog_.webp"
            )
        );
    }
    return view('Produits', [
        "products"=>$produits,
        "categorie"=>$cat
    ]);
});




