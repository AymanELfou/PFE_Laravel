<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProduitController;
use App\Http\Controllers\RproductController;
use App\Models\Rproduit;
use Illuminate\Support\Facades\Auth;

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


Route::get('/' , function () {
    return view('welcome');
}); 

//Route::get('/products',[ProduitController::class,'home']); 

Route::get('/produitss/{cat}',[ProduitController::class,'getProdByCat']);


/*************Routes Controller Resource************/
/**
** Route::get('/produits', 'RproductController@index')->name('index');    //    Appel : <a href="{{ route('name') }}">
** Route::get('/produits/create',[RproductController::class,'create'])->name('create');
** Route::post('/produits', [RproductController::class,'store'])->name('store');
** Route::get('/produits/{id}', [RproductController::class,'show'])->name('show');
** Route::get('/produits/{id}/edit', [RproductController::class,'edit'])->name('edit'); // Appel : route('edit', ['id' => $id]);
** Route::put('/produits/{id}', [RproductController::class,'update'])->name('update');
** Route::delete('/produits/{id}', [RproductController::class,'destroy'])->name('destroy');
**/

//Route::resource('produits', RproductController::class);


Route::get('/produits/create',[RproductController::class,'create'])->name('create');

Route::put('/produits/{id}', [RproductController::class,'update'])->name('update');

Route::delete('/produits/{id}', [RproductController::class,'destroy'])->name('destroy');



Route::get('/espaceclient', [RproductController::class,'client'])->middleware('useruser');

Route::get('/Contact', [RproductController::class,'Contact'])->middleware('useruser');



/************* Routes Authentification ************/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/produits', [RproductController::class, 'index'])->middleware('adminuser');


Route::get('/catalogue', [ProduitController::class,'cataloguepdf'])->middleware('useruser');




Route::middleware(['adminuser'])->group(function () {

    Route::get('/produits/{id}', [RproductController::class,'show'])->name('show');
    Route::get('/produits/{id}/edit', [RproductController::class,'edit'])->name('edit');
    Route::post('/produits', [RproductController::class,'store'])->name('store');
    Route::get('/produits/create', [RproductController::class,'create'])->name('create');    //    Appel : <a href="{{ route('name') }}">
    Route::put('/produits/{id}', [RproductController::class,'update'])->name('update');
    Route::delete('/produits/{id}', [RproductController::class,'destroy'])->name('destroy');
   



});



/************* Routes Cart ************/



Route::get('/CardsProd',[RproductController::class,'showcards']);


Route::get('/cart',[RproductController::class,'cart']);

Route::get('/cart/addc/{id}',[RproductController::class,'AddTocart'])->name('add_to_cart');

Route::patch('update-cart',[RproductController::class,'updateCrt']);

Route::delete('remove-from-cart',[RproductController::class,'removeCrt']);




/************* Routes Cart ************/



Route::get('/contact', [RproductController::class,'email']);
Route::post('/contact/email', [RproductController::class, 'sendEmail'])->name('send.email');