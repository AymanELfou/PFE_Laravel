<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;

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


Route::get('/',[ProduitController::class,'home']); 
   

Route::get('/produits/{cat}',[ProduitController::class,'getProdByCat']);
    



