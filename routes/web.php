<?php

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

Route::get('/', function () {
    //return request()->header('user-agent');
    //return request()->ip();

    if (auth::check()) {
        return redirect()->route('home.index');
        }
        else{
        return view('auth.login');
        }

});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

//Route::get('/tickets', [App\Http\Controllers\TicketController::class, 'index'])->name('home');

Route::resource('home', App\Http\Controllers\HomeController::class)->middleware('auth');
Route::put('culminar', ['as' => 'home.update', 'uses' => 'App\Http\Controllers\HomeController@update'])->middleware('auth');
Route::patch('/ticket/{id}/modificar', 'TicketDetalleController@analista')->middleware('auth');
Route::resource('ticket', App\Http\Controllers\TicketDetalleController::class)->middleware('auth');
Route::put('remove_analista',[TicketDetalleController::class, 'analista'])->name('removeanalista')->middleware('auth');
Route::resource('/tickets', App\Http\Controllers\TicketController::class)->middleware('auth');
Route::resource('fallas', App\Http\Controllers\AsuntoController::class)->middleware('auth');
Route::resource('departamentos', App\Http\Controllers\DepartamentoController::class)->middleware('auth');
Route::resource('user', App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('marcas', App\Http\Controllers\MarcahwController::class)->middleware('auth');
Route::resource('equipos', App\Http\Controllers\HardwareController::class)->middleware('auth');
Route::resource('contratistas', App\Http\Controllers\ContratistaController::class)->middleware('auth');
Route::resource('empleados', App\Http\Controllers\EmpleadoController::class)->middleware('auth');
Route::resource('entradas', App\Http\Controllers\EntradasController::class)->middleware('auth');
Route::put('user/password', ['as' => 'user.password', 'uses' => 'App\Http\Controllers\UserController@password'])->middleware('auth');
Route::post('user/importar', ['as' => 'user.importar', 'uses' => 'App\Http\Controllers\UserController@importar'])->middleware('auth');
Route::name('print')->get('/imprimir', 'App\Http\Controllers\HomeController@imprimir');
Route::name('analista')->get('/analista/{id}', 'App\Http\Controllers\HomeController@analista');
Route::resource('inventario', App\Http\Controllers\InventarioController::class)->middleware('auth');
Route::resource('asignar_equipo', App\Http\Controllers\HardwareUsuarioController::class)->middleware('auth');
Route::resource('salidas_socios', App\Http\Controllers\SalidaSocioController::class)->middleware('auth');
Route::post('salidas_socios/importar', ['as' => 'salidas_socios.importar', 'uses' => 'App\Http\Controllers\SalidaSocioController@importar'])->middleware('auth');

