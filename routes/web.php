<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
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

// Route::get('/', function () {
//     return redirect()->route('admin.clientes');
// });

Route::get('/', [ProdutoController::class, 'index'])->name('produto.index'); // controllers

Route::get('/produto/{id?}', [ProdutoController::class, 'show'])->name('produto.show'); // controllers

// // Grupo de rotas
// Route::prefix('admin')->group(function(){
//     Route::get('dashboard', function(){
//         return "dashboard";
//     });
 
// Route::group([
//     'prefix' => 'admin',
//     'as' => 'admin.'
// ], function(){
//     Route::get('dashboard', function(){
//         return "dashboard";
//     })->name('dashboard');

//     Route::get('users', function(){
//         return "users";
//     })->name('users');
    
//     Route::get('clientes', function(){
//         return "clientes";
//     })->name('clientes');
// });




// Route::get('/empresa', function(){
// return view('site/empresa');
// });

// Route::any('/any', function(){
//     return "Permite todo tipo de acesso HTTP (put, delete, get, post)";
// });

// Route::match(['get', 'post'], '/match', function(){ // passando os acessos permitidos = get e post
//     return "Permite apenas acessos definidos";
// });

// Route::get('/produto/{id}/{cat}', function($id, $cat){ //pasando parametros
//     return " O id do produto é: " . $id . "<br>" . "E sua categoria é: " . $cat;
// });

// Route::redirect('/sobre', 'empresa');//acesaar a tota sobre redireciona para empresa
// Route::view('/empresa', 'site/empresa');// se for renderizar apenas uma view, pode ser feito assim

// Route::get('/news', function(){
//     return view('news');
// })->name('noticias');//nomeando uma rota

// Route::get('/novidades', function(){
//     return redirect()->route('noticias');
// });//redirecionando para a rota nomeada news, atraves do name da rota

