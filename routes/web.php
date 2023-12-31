<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

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

Route::resource('produtos', ProdutoController::class);
Route::resource('users', UserController::class);

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('site.details');
Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('site.categoria');

Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('site.carrinho');
Route::post('/carrinho', [CarrinhoController::class, 'adicionaCarrinho'])->name('site.addcarrinho');
Route::post('/remover', [CarrinhoController::class, 'removeCarrinho'])->name('site.removecarrinho');
Route::post('/atualizar', [CarrinhoController::class, 'atualizaCarrinho'])->name('site.atualizacarrinho');
Route::get('/limpar', [CarrinhoController::class, 'limparCarrinho'])->name('site.limparcarrinho');

Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/register', [LoginController::class, 'create'])->name('login.create');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'checkemail']);
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/produtos', function(){
    return view('admin.produtos');
})->name('admin.produtos');




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

