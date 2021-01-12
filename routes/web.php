<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test','ConfigController@test');
// menu
Route::get('/menu/', function () {
	return view('menu');
});
// ver que se hace con esto

Route::get('/mailNPA_enviar/{id}','MensajeNPAController@NuevoPedido');
Route::post('/NPA/enviar/','MensajeNPAController@Send');
// salidas
Route::get('/salida/nueva','MovimientosController@salida');
Route::post('/salida/nueva','MovimientosController@salida_store');
// entradas
Route::get('/entrada/nueva','MovimientosController@entrada');
Route::post('/entrada/detalle','MovimientosController@entrada_detalle');
Route::post('/entrada/nueva','MovimientosController@entrada_store');

// conceptos
Route::get('/conceptos/','ConceptosController@index');
Route::get('/conceptos/eliminar/{id}','ConceptosController@eliminar');
Route::post('/conceptos/eliminar_do/','ConceptosController@destroy');
Route::get('/conceptos/editar/{id}','ConceptosController@edit');
Route::post('/conceptos/editar_do/','ConceptosController@update');
Route::get('/conceptos/nuevo/','ConceptosController@create');
Route::post('/conceptos/nuevo_do/','ConceptosController@store');
Route::get('/conceptos/select','ConceptosController@show');


// proveedores
Route::get('/proveedores/','ProveedoresController@index');
Route::get('/proveedores/eliminar/{id}','ProveedoresController@eliminar');
Route::post('/proveedores/eliminar_do/','ProveedoresController@destroy');
Route::get('/proveedores/editar/{id}','ProveedoresController@edit');
Route::post('/proveedores/editar_do/','ProveedoresController@update');
Route::get('/proveedores/nuevo/','ProveedoresController@create');
Route::post('/proveedores/nuevo_do/','ProveedoresController@store');
Route::get('/proveedores/select','ProveedoresController@show');
Route::get('/proveedores/efectores/{proveedor}','ProvEfectsController@create');
Route::get('/proveedores/asignar/{proveedor}/{efector}','ProvEfectsController@asignar');
Route::get('/proveedores/desasignar/{id}','ProvEfectsController@destroy');
Route::get('/provefect/{efector}','ProvEfectsController@show');

// servicios
// usuarios
Route::get('/usuarios/','UserController@index');
Route::get('/usuarios/eliminar/{id}','UserController@eliminar');
Route::post('/usuarios/eliminar_do/','UserController@destroy');
Route::get('/usuarios/editar/{id}','UserController@edit');
Route::post('/usuarios/editar_do/','UserController@update');
Route::get('/usuarios/efectores/{usuario}','UserEfecController@create');
Route::get('/usuarios/asignar/{usuario}/{estructura}','UserEfecController@asignar');
Route::get('/usuarios/desasignar/{id}','UserEfecController@destroy');

Route::get('/usuarios/select','UserController@show');
Route::get('/usuarios/tipo','UserController@tipodeusuario');

Route::get('/efectores/importar','EfectoresController@store');
Route::get('/error',function(){return "Error";});
Route::get('/error_noautorizado',function(){return view("noautorizado")->with('mensajefinal','prestación no habilitada para este usuario');});
Route::get('/error_nodesarrollado',function(){return view("noautorizado")->with('mensajefinal','prestación no desarrolada actualmente');});

	
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/servicios', 'HomeController@index_servicios')->name('servicios');
Route::get('/home/tablas', 'HomeController@index_tablas')->name('tablas');

// Exportaciones Excel Pendiente unificar clases (PedidosExport, ahora sin uso)
use App\Exports\VarExport;
use App\Exports\PasExport;
use App\Exports\VargExport;
use App\Exports\VacExport;


use Maatwebsite\Excel\Facades\Excel;
 
Route::get('/pedidos/excel_arealizar', function () {
    return Excel::download(new VarExport, 'visitas_arealizar.xlsx');
});

// Clear
//Clase Config
Route::get('/clearall','ConfigController@clearAll');
Route::get('/cacheall','ConfigController@cacheAll');

//Otras
Route::get('/clearcache',function(){ $exitCode = Artisan::call('cache:clear'); return $exitCode;});
Route::get('/clearvistas',function(){ $exitCode = Artisan::call('view:clear'); return $exitCode;});

