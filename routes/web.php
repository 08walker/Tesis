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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contacto', 'VistasController@contacto')->name('contacto');

//Rutas provincias
Route::group([
    'prefix'=>'provincias',
    'middleware'=>'auth'
],
function(){
Route::get('/','ProvinciaController@index')->name('provincias');
Route::get('/crear','ProvinciaController@create')->name('provincias.create');
Route::post('/crear','ProvinciaController@store');
Route::get('/{provincia}','ProvinciaController@show')->name('provincias.show');
Route::get('/{provincia}/editar','ProvinciaController@edit')->name('provincias.edit');
Route::put('/{provincia}','ProvinciaController@update')->name('provincias.update');
Route::delete('/{provincia}','ProvinciaController@destroy')->name('provincias.destroy');
});

//Rutas municipios
Route::group([
    'prefix'=>'municipios',
    'middleware'=>'auth'
],
function(){
Route::get('/','MunicipioController@index')->name('municipios');
Route::get('/crear','MunicipioController@create')->name('municipios.create');
Route::post('/crear','MunicipioController@store')->name('municipios.create');
Route::get('/{municipio}','MunicipioController@show')->name('municipios.show');
Route::get('/{municipio}/editar','MunicipioController@edit')->name('municipios.edit');
Route::put('/{municipio}','MunicipioController@update')->name('municipios.update');
Route::delete('/{municipio}','MunicipioController@destroy')->name('municipios.destroy');
});


//Rutas arrastres
Route::group([
    'prefix'=>'arrastres',
    'middleware'=>'auth'
],
function(){
Route::get('/','ArrastreController@index')->name('arrastres');
Route::get('/{id}','ArrastreController@show')->where('id','[0-9]+')->name('arrastres.show');
Route::get('/crear','ArrastreController@create')->name('arrastres.create');
Route::post('/crear','ArrastreController@store')->name('arrastres.create');
Route::get('/{arrastre}/editar','ArrastreController@edit')->name('arrastres.edit');
Route::put('/{arrastre}','ArrastreController@update')->name('arrastres.update');
Route::delete('/{arratre}','ArrastreController@destroy')->name('arrastres.destroy');
});



//Rutas choferes
Route::group([
    'prefix'=>'choferes',
    'middleware'=>'auth'
],
function(){
Route::get('/','ChoferController@index')->name('choferes');
Route::get('/{id}','ChoferController@show')->where('id','[0-9]+')->name('choferes.show');
Route::post('/crear','ChoferController@store');
Route::get('/crear','ChoferController@create')->name('choferes.create');
Route::get('/{chofer}/editar','ChoferController@edit')->name('choferes.edit');
Route::put('/{chofer}','ChoferController@update')->name('choferes.update');
Route::delete('/{chofer}','ChoferController@destroy')->name('choferes.destroy');
});

//Rutas envases
Route::group([
    'prefix'=>'envases',
    'middleware'=>'auth'
],
function(){
Route::get('/','EnvaseController@index')->name('envases');
Route::get('/{id}','EnvaseController@show')->where('id','[0-9]+')->name('envases.show');
Route::post('/crear','EnvaseController@store');
Route::get('/crear','EnvaseController@create')->name('envases.create');
Route::get('/{envase}/editar','EnvaseController@edit')->name('envases.edit');
Route::put('/{envase}','EnvaseController@update')->name('envases.update');
Route::delete('/{envase}','EnvaseController@destroy')->name('envases.destroy');
});


//Rutas equipos
Route::group([
    'prefix'=>'equipos',
    'middleware'=>'auth'
],
function(){
Route::get('/','EquipoController@index')->name('equipos');
Route::get('/{id}','EquipoController@show')->where('id','[0-9]+')->name('equipos.show');
Route::post('/crear','EquipoController@store');
Route::get('/crear','EquipoController@create')->name('equipos.create');
Route::get('/{equipo}/editar','EquipoController@edit')->name('equipos.edit');
Route::put('/{equipo}','EquipoController@update')->name('equipos.update');
Route::delete('/{equipo}','EquipoController@destroy')->name('equipos.destroy');
});


//Rutas lugares
Route::group([
    'prefix'=>'lugares',
    'middleware'=>'auth'
],
function(){
Route::get('/','LugarController@index')->name('lugares');
Route::get('/{id}','LugarController@show')->where('id','[0-9]+')->name('lugares.show');
Route::post('/crear','LugarController@store');
Route::get('/crear','LugarController@create')->name('lugares.create');
Route::get('/{lugar}/editar','LugarController@edit')->name('lugares.edit');
Route::put('/{lugar}','LugarController@update')->name('lugares.update');
Route::delete('/{lugar}','LugarController@destroy')->name('lugares.destroy');
});


//Rutas terceros
Route::group([
    'prefix'=>'terceros',
    'middleware'=>'auth'
],
function(){
Route::get('/','TerceroController@index')->name('terceros');
Route::post('/crear','TerceroController@store');
Route::get('/crear','TerceroController@create')->name('terceros.create');
Route::get('/{tercero}','TerceroController@show')->name('terceros.show');
Route::get('/{tercero}/editar','TerceroController@edit')->name('terceros.edit');
Route::put('/{tercero}','TerceroController@update')->name('terceros.update');
Route::delete('/{tercero}','TerceroController@destroy')->name('terceros.destroy');
});



//Rutas organizaciones
Route::group([
    'prefix'=>'organizaciones',
    'middleware'=>'auth'
],
function(){
Route::get('/','OrganizacionController@index')->name('organizaciones');
Route::post('/crear','OrganizacionController@store');
Route::get('/crear','OrganizacionController@create')->name('organizaciones.create');
Route::get('/{organizacion}','OrganizacionController@show')->name('organizaciones.show');
Route::get('/{organizacion}/editar','OrganizacionController@edit')->name('organizaciones.edit');
Route::put('/{organizacion}','OrganizacionController@update')->name('organizaciones.update');
Route::delete('/{organizacion}','OrganizacionController@destroy')->name('organizaciones.destroy');
});


//Rutas Productos
Route::group([
    'prefix'=>'productos',
    'middleware'=>'auth'
],
function(){
Route::get('/','ProductoController@index')->name('productos');
Route::get('/{id}','ProductoController@show')->where('id','[0-9]+')->name('productos.show');
Route::post('/crear','ProductoController@store');
Route::get('/crear','ProductoController@create')->name('productos.create');
Route::get('/{producto}/editar','ProductoController@edit')->name('productos.edit');
Route::put('/{producto}','ProductoController@update')->name('productos.update');
Route::delete('/{producto}','ProductoController@destroy')->name('productos.destroy');
});

//Rutas Productos
Route::group([
    'prefix'=>'transportaciones',
    'middleware'=>'auth'
],
function(){
Route::get('/','TransportacionController@index')->name('transportaciones');
//Route::get('/{id}','TransportacionController@show')->where('id','[0-9]+')->name('transportaciones.show');
Route::get('/crear','TransportacionController@create')->name('transportaciones.create');
Route::post('/crear','TransportacionController@store');
Route::get('/llenar','TransportacionController@llenar')->name('transportaciones.llenar');
Route::post('/llenar','TransportacionController@guardar');
//Route::get('/{transportacion}/editar','TransportacionController@edit')->name('transportaciones.edit');
//Route::put('/{transportacion}','TransportacionController@update')->name('transportaciones.update');
//Route::delete('/{transportacion}','TransportacionController@destroy')->name('transportaciones.destroy');
});