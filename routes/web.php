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

//Rutas predeterminadas de Laravel para la autenticacion,al final del documento inclui manualmente estas rutas para que solo el administrador pueda crear usuarios.
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contacto', 'VistasController@contacto')->name('contacto');

//Rutas provincias
Route::group([
    'prefix'=>'reportes',
    'middleware'=>'auth'
],
function(){
Route::get('/','ReportesController@index')->name('reportes');
Route::get('/reporte1','ReportesController@reporte1')->name('reportes.reporte1');
Route::get('/reporte2','ReportesController@reporte2')->name('reportes.reporte2');
Route::get('/reporte3','ReportesController@reporte3')->name('reportes.reporte3');
Route::get('/reporte4','ReportesController@reporte4')->name('reportes.reporte4');
Route::get('/reporte5','ReportesController@reporte5')->name('reportes.reporte5');
Route::get('/reporte6','ReportesController@reporte6')->name('reportes.reporte6');
//Route::get('/reporte7','ReportesController@reporte7')->name('reportes.reporte7');
Route::get('/reporte8','ReportesController@reporte8')->name('reportes.reporte8');
Route::get('/reporte9','ReportesController@reporte9')->name('reportes.reporte9');
});

//Rutas provincias
Route::group([
    'prefix'=>'provincias',
    'middleware'=>'auth'
],
function(){
Route::get('/','ProvinciaController@index')->name('provincias');
Route::get('/crear','ProvinciaController@create')->name('provincias.create');
Route::post('/crear','ProvinciaController@store');
//Route::get('/{provincia}','ProvinciaController@show')->name('provincias.show');
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
//Route::get('/{municipio}','MunicipioController@show')->name('municipios.show');
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
// Route::get('/{id}','ArrastreController@show')->where('id','[0-9]+')->name('arrastres.show');
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
// Route::get('/{id}','ChoferController@show')->where('id','[0-9]+')->name('choferes.show');
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
// Route::get('/{id}','EnvaseController@show')->where('id','[0-9]+')->name('envases.show');
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
// Route::get('/{id}','EquipoController@show')->where('id','[0-9]+')->name('equipos.show');
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
// Route::get('/{id}','LugarController@show')->where('id','[0-9]+')->name('lugares.show');
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
// Route::get('/{tercero}','TerceroController@show')->name('terceros.show');
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
// Route::get('/{organizacion}','OrganizacionController@show')->name('organizaciones.show');
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
// Route::get('/{id}','ProductoController@show')->where('id','[0-9]+')->name('productos.show');
Route::post('/crear','ProductoController@store');
Route::get('/crear','ProductoController@create')->name('productos.create');
Route::get('/{producto}/editar','ProductoController@edit')->name('productos.edit');
Route::put('/{producto}','ProductoController@update')->name('productos.update');
Route::delete('/{producto}','ProductoController@destroy')->name('productos.destroy');
});

//Rutas Transportaciones
Route::group([
    'prefix'=>'transportaciones',
    'middleware'=>'auth'
],
function(){
Route::get('/','TransportacionController@index')->name('transportaciones');
Route::get('/{id}/llenar','TransportacionController@show')->where('id','[0-9]+')->name('transportaciones.show');
Route::get('/crear','TransportacionController@create')->name('transportaciones.create');
Route::post('/crear','TransportacionController@store');
Route::get('/llenar','TransportacionController@llenar')->name('transportaciones.llenar');
Route::post('/llenar','TransportacionController@guardar');
Route::get('/{transportacion}/editar','TransportacionController@edit')->name('transportaciones.edit');
Route::put('/{transportacion}','TransportacionController@update')->name('transportaciones.update');
Route::delete('/{transportacion}','TransportacionController@destroy')
      ->name('transportaciones.destroy');

Route::post('/añadir/chofer/{transportacion}','TransportacionController@storechofer')
      ->name('transportaciones.choferes');
Route::post('/añadir/arrastre/{transportacion}','TransportacionController@storearrastre')
      ->name('transportaciones.arrastres');
Route::post('/añadir/envase/','TransportacionController@storeenvase')
      ->name('transportaciones.envases');

Route::get('/{transportacion}/incidencia','HitoController@create')
      ->name('transportaciones.incidencia');
Route::post('/{transportacion}/incidencia','HitoController@store');


});

//Rutas de transferencia enviadas
  //Route::resource('tenv','TransfEnviadaController');
Route::group([
    'prefix'=>'tenv',
    'middleware'=>'auth'
],
function(){

//Route::get('/','TransfEnviadaController@index')->name('transportaciones');

Route::get('/{id}/crear','TransfEnviadaController@create')->name('tenv.create');
Route::post('/{id}/crear','TransfEnviadaController@store');

Route::get('/','TransfEnviadaController@index')->name('tenv');
//Route::get('/{id}/llenar','TransfEnviadaController@show')->where('id','[0-9]+')->name('tenv.show');

Route::post('/{id}','TransfEnviadaController@storeproducto')->name('tenv.storeproducto');
Route::get('/{id}/llenar','TransfEnviadaController@llenar')->name('tenv.llenar');

Route::get('/{tenv}/editar','TransfEnviadaController@edit')->name('tenv.edit');
Route::put('/{tenv}','TransfEnviadaController@update')->name('tenv.update');
Route::delete('/{tenv}','TransfEnviadaController@destroy')->name('tenv.destroy');
});

//Rutas de transferencia enviadas
Route::resource('trec','TransfRecibidaController');

//Rutas tipo unidad de medidas
Route::group([
    'prefix'=>'tipounidad',
    'middleware'=>'auth'
],
function(){
Route::get('/','TipoUnidadMedidaController@index')->name('tipounidad');
Route::get('/crear','TipoUnidadMedidaController@create')->name('tipounidad.create');
Route::post('/crear','TipoUnidadMedidaController@store')->name('tipounidad.create');
// Route::get('/{id}','TipoUnidadMedidaController@show')->name('tipounidad.show');
Route::get('/{tipoUnidadMedida}/editar','TipoUnidadMedidaController@edit')->name('tipounidad.edit');
Route::put('/{tipoUnidadMedida}','TipoUnidadMedidaController@update')->name('tipounidad.update');
Route::delete('/{tipoUnidadMedida}','TipoUnidadMedidaController@destroy')->name('tipounidad.destroy');
});

//Rutas tipo arrastre
Route::group([
    'prefix'=>'tipoarrastre',
    'middleware'=>'auth'
],
function(){
Route::get('/','TipoArrastreController@index')->name('tipoarrastre');
Route::get('/crear','TipoArrastreController@create')->name('tipoarrastre.create');
Route::post('/crear','TipoArrastreController@store')->name('tipoarrastre.create');
// Route::get('/{id}','TipoArrastreController@show')->name('tipoarrastre.show');
Route::get('/{tipoArrastre}/editar','TipoArrastreController@edit')->name('tipoarrastre.edit');
Route::put('/{tipoArrastre}','TipoArrastreController@update')->name('tipoarrastre.update');
Route::delete('/{tipoArrastre}','TipoArrastreController@destroy')->name('tipoarrastre.destroy');
});


//Rutas Unidades de medidas
Route::group([
    'prefix'=>'unidadmedida',
    'middleware'=>'auth'
],
function(){
Route::get('/','UnidadMedidaController@index')->name('unidadmedida');
Route::get('/crear','UnidadMedidaController@create')->name('unidadmedida.create');
Route::post('/crear','UnidadMedidaController@store')->name('unidadmedida.create');
// Route::get('/{id}','UnidadMedidaController@show')->name('unidadmedida.show');
Route::get('/{unidadMedida}/editar','UnidadMedidaController@edit')->name('unidadmedida.edit');
Route::put('/{unidadMedida}','UnidadMedidaController@update')->name('unidadmedida.update');
Route::delete('/{unidadMedida}','UnidadMedidaController@destroy')->name('unidadmedida.destroy');
});

//Route::resource('tipohito','TipoHitoController');
//Rutas tipo unidad de medidas
Route::group([
    'prefix'=>'tipohito',
    'middleware'=>'auth'
],
function(){
Route::get('/','TipoHitoController@index')->name('tipohito');
Route::get('/crear','TipoHitoController@create')->name('tipohito.create');
Route::post('/crear','TipoHitoController@store')->name('tipohito.create');
Route::get('/{id}','TipoHitoController@show')->name('tipohito.show');
Route::get('/{tipoHito}/editar','TipoHitoController@edit')->name('tipohito.edit');
Route::put('/{tipoHito}','TipoHitoController@update')->name('tipohito.update');
Route::delete('/{tipoHito}','TipoHitoController@destroy')->name('tipohito.destroy');
});

//Rutas tipo equipo
Route::group([
    'prefix'=>'tipoequipo',
    'middleware'=>'auth'
],
function(){
Route::get('/','TipoEquipoController@index')->name('tipoequipo');
Route::get('/crear','TipoEquipoController@create')->name('tipoequipo.create');
Route::post('/crear','TipoEquipoController@store')->name('tipoequipo.create');
// Route::get('/{id}','TipoEquipoController@show')->name('tipoequipo.show');
Route::get('/{tipoEquipo}/editar','TipoEquipoController@edit')->name('tipoequipo.edit');
Route::put('/{tipoEquipo}','TipoEquipoController@update')->name('tipoequipo.update');
Route::delete('/{tipoEquipo}','TipoEquipoController@destroy')->name('tipoequipo.destroy');
});

Route::group([
    'middleware'=>'auth'
],
function(){
Route::resource('directivo','DirectivoController',['except'=>'show']);
Route::get('/trazas', 'TrazasController@index')->name('trazas');
});

Route::resource('roles','RolesController',['except'=>'show','as'=>'admin']);

Route::resource('user','UsersController');

// Route::middleware('role:Admin')
//       ->put('users/{user}/roles','UsersRolesController@update')
//         ->name('user.roles.update');

Route::middleware('role:Admin')
    ->put('users/{user}/permissions','UsersPermissionsController@update')
    ->name('user.permissions.update');

Route::resource('permissions','PermissionsController',['only'=>['index','edit','update'],'as'=>'admin']);

Route::middleware('role:Admin')
    ->put('users/{user}/roles','UsersRolesController@update')
    ->name('user.roles.update');


// Authentication Routes...
  Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
  Route::post('login', 'Auth\LoginController@login');
  Route::post('logout', 'Auth\LoginController@logout')->name('logout');

  // Registration Routes...
  // Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
  // Route::post('register', 'Auth\RegisterController@register');

  // Password Reset Routes...
  Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
  Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
  Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
  Route::post('password/reset', 'Auth\ResetPasswordController@reset');

