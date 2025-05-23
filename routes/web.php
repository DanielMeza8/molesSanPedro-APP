<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProductoController;
use App\Models\Categoria;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\RecetasController;
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

//crear admin solo usar una vez
//Route::get('/crearAdmin', [AuthController::class, 'crearAdmin']);


Route::get('/', [ProductoController::class, 'welcome'])->name('inicio');

// Route::get('/login', function () {
//     return view('login/login');
// });

Route::middleware("auth")->group(function(){
    Route::get('/moleSanPedro-Administrador', [AdminController::class, 'index'])->name('indexAdmin');
});

Route::get('/l', [AuthController::class, 'index'])->name('login');
Route::post('/logear', [AuthController::class, 'logear'])->name('entrar');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/moleSanPedro-Productos',);

Route::prefix('moleSanPedro-Categorias')->middleware('auth')->group(function(){
    Route::get('/', [CategoriaController::class, 'index'])->name('categorias');
    Route::post('/guardarCategoria', [CategoriaController::class, 'store'])->name('categorias.guardar');
});

Route::prefix('moleSanPedro-Productos')->middleware('auth')->group(function(){
    Route::get('/', [ProductoController::class, 'index'])->name('productos.index');
    Route::post('/guardarProducto', [ProductoController::class, 'store'])->name('productos.guardar');
    Route::get('/linkProducto', [LinkController::class, 'index'])->name('links.index');
    Route::post('/guardarLinkProducto', [LinkController::class, 'store'])->name('links.guardar');
    Route::put('/linkProducto/editar/{id}', [LinkController::class, 'update'])->name('links.actualizar');
    Route::delete('/linkProducto/eliminar/{id}', [LinkController::class, 'destroy'])->name('links.eliminar');

});

Route::prefix('moleSanPedro-CodigoBarras')->middleware('auth')->group(function(){
    Route::post('/importar',[ExcelController::class, 'importar'])->name('importar.excel');
});




Route::get('/registro', function () {
    return view('login/registro');
});

Route::get('/molesSanPedro-RECETAS', [RecetasController::class, 'index'])->name('recetas');
Route::prefix('moleSanPedro')->group(function(){
    Route::get('/Nosotros', function(){ 
        return view('nav/acercade');
    })->name('acercaDe');

    Route::get('/Productos',[RecetasController::class, 'productos'])->name('productos');
});