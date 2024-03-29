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

//Para probar el envio de correos
// Route::get('email',function(){
//   return new App\Mail\EnviarIncidencia(App\Hito::first(),'pepe@pepe.com');
// });

Route::get('chart', 'ChartController@index');

Route::get('/', function () {
    return view('welcome');
});

//Rutas predeterminadas de Laravel para la autenticacion,al final del documento inclui manualmente estas rutas para que solo el administrador pueda crear usuarios.
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contacto', 'VistasController@contacto')->name('contacto');

//Rutas reportes
Route::group([
    'prefix'=>'reportes',
    'middleware'=>'auth'
],
function(){
Route::get('/','ReportesController@index')->name('reportes');
Route::get('/reporte1/','ReportesController@reporte1')->name('reportes.reporte1');
Route::post('/reporte1','ReportesController@reporte1filtrado')->name('reportes.reporte1filtrado');
Route::get('/reporte2','ReportesController@reporte2')->name('reportes.reporte2');
Route::post('/reporte2','ReportesController@reporte2filtrado')->name('reportes.reporte2filtrado');
Route::get('/reporte3','ReportesController@reporte3')->name('reportes.reporte3');
Route::get('/reporte4','ReportesController@reporte4')->name('reportes.reporte4');
Route::get('/reporte5','ReportesController@reporte5')->name('reportes.reporte5');
Route::post('/reporte5','ReportesController@reporte5filtrado')->name('reportes.reporte5filtrado');
Route::get('/reporte6','ReportesController@reporte6')->name('reportes.reporte6');
Route::post('/reporte6','ReportesController@reporte6filtrado')->name('reportes.reporte6filtrado');
Route::get('/reporte7','ReportesController@reporte7')->name('reportes.reporte7');
Route::get('/reporte8','ReportesController@reporte8')->name('reportes.reporte8');
Route::post('/reporte8','ReportesController@reporte8filtrado')->name('reportes.reporte8filtrado');
Route::get('/reporte9','ReportesController@reporte9')->name('reportes.reporte9');
Route::post('/reporte9','ReportesController@reporte9filtrado')->name('reportes.reporte9filtrado');
Route::get('/reporte10','ReportesController@reporte10')->name('reportes.reporte10');
Route::post('/reporte10','ReportesController@reporte10filtrado')->name('reportes.reporte10filtrado');
Route::get('/reporte11','ReportesController@reporte11')->name('reportes.reporte11');
Route::post('/reporte11','ReportesController@reporte11filtrado')->name('reportes.reporte11filtrado');
Route::get('/reporte12','ReportesController@reporte12')->name('reportes.reporte12');
Route::post('/reporte12','ReportesController@reporte12filtrado')->name('reportes.reporte12filtrado');
Route::get('/reporte13','ReportesController@reporte13')->name('reportes.reporte13');
Route::post('/reporte13','ReportesController@reporte13filtrado')->name('reportes.reporte13filtrado');
Route::get('/reporte14','ReportesController@reporte14')->name('reportes.reporte14');
Route::post('/reporte14','ReportesController@reporte14filtrado')->name('reportes.reporte14filtrado');
Route::get('/reporte15','ReportesController@reporte15')->name('reportes.reporte15');
Route::post('/reporte15','ReportesController@reporte15filtrado')->name('reportes.reporte15filtrado');
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
Route::put('/{provincia}/activar','ProvinciaController@activar')->name('provincias.activar');
Route::delete('/{provincia}','ProvinciaController@destroy')->name('provincias.destroy');
Route::get('/desactivados','ProvinciaController@desactivados')->name('provincias.desactivados');
});

//Rutas municipios
Route::group([
    'prefix'=>'municipios',
    //'middleware'=>'auth'
],
function(){
Route::get('/','MunicipioController@index')->name('municipios');
Route::get('/crear','MunicipioController@create')->name('municipios.create');
Route::post('/crear','MunicipioController@store')->name('municipios.store');
//Route::get('/{municipio}','MunicipioController@show')->name('municipios.show');
Route::get('/{municipio}/editar','MunicipioController@edit')->name('municipios.edit');
Route::put('/{municipio}','MunicipioController@update')->name('municipios.update');
Route::delete('/{municipio}','MunicipioController@destroy')->name('municipios.destroy');
Route::put('/{municipio}/activar','MunicipioController@activar')->name('municipios.activar');
Route::get('/desactivados','MunicipioController@desactivados')->name('municipios.desactivados');
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
Route::put('/{arrastre}/activar','ArrastreController@activar')->name('arrastres.activar');
Route::delete('/{arrastre}','ArrastreController@destroy')->name('arrastres.destroy');
Route::get('/desactivados','ArrastreController@desactivados')->name('arrastres.desactivados');
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
Route::put('/{chofer}/activar','ChoferController@activar')->name('choferes.activar');
Route::delete('/{chofer}','ChoferController@destroy')->name('choferes.destroy');
Route::get('/desactivados','ChoferController@desactivados')->name('choferes.desactivados');
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
Route::put('/{envase}/activar','EnvaseController@activar')->name('envases.activar');
Route::delete('/{envase}','EnvaseController@destroy')->name('envases.destroy');
Route::get('/desactivados','EnvaseController@desactivados')->name('envases.desactivados');
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
Route::put('/{equipo}/activar','EquipoController@activar')->name('equipos.activar');
Route::delete('/{equipo}','EquipoController@destroy')->name('equipos.destroy');
Route::get('/desactivados','EquipoController@desactivados')->name('equipos.desactivados');
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
Route::put('/{lugar}/activar','LugarController@activar')->name('lugares.activar');
Route::delete('/{lugar}','LugarController@destroy')->name('lugares.destroy');
Route::get('/desactivados','LugarController@desactivados')->name('lugares.desactivados');
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
Route::put('/{tercero}/activar','TerceroController@activar')->name('terceros.activar');
Route::delete('/{tercero}','TerceroController@destroy')->name('terceros.destroy');
Route::get('/desactivados','TerceroController@desactivados')->name('terceros.desactivados');
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
Route::put('/{organizacion}/activar','OrganizacionController@activar')->name('organizaciones.activar');
Route::get('/desactivados','OrganizacionController@desactivados')->name('organizaciones.desactivados');
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
Route::put('/{producto}/activar','ProductoController@activar')->name('productos.activar');
Route::delete('/{producto}','ProductoController@destroy')->name('productos.destroy');
Route::get('/desactivados','ProductoController@desactivados')->name('productos.desactivados');
});


//Rutas Transportaciones
Route::group([
    'prefix'=>'transportaciones',
    'middleware'=>'auth'
],
function(){
Route::get('/','TransportacionController@index')->name('transportaciones');
Route::get('/terminadas','TransportacionController@index2')->name('transportaciones.terminadas');
Route::get('/todas','TransportacionController@index3')->name('transportaciones.todas');
Route::get('/{id}/llenar','TransportacionController@formllenar')
        ->where('id','[0-9]+')->name('transportaciones.formllenar');
Route::get('/crear','TransportacionController@create')->name('transportaciones.create');
Route::post('/crear','TransportacionController@store');
Route::get('/llenar','TransportacionController@llenar')->name('transportaciones.llenar');
Route::post('/llenar','TransportacionController@guardar');
Route::get('/{transportacion}/editar','TransportacionController@edit')->name('transportaciones.edit');
Route::put('/{transportacion}','TransportacionController@update')->name('transportaciones.update');
Route::get('/{transportacion}/detalles','TransportacionController@detalles')->name('transportaciones.detalles');
Route::delete('/{transportacion}','TransportacionController@destroy')
      ->name('transportaciones.destroy');
});

Route::group([
    'middleware'=>'auth'
],
function(){
Route::get('/{id}/transportacion','HitoController@lista')->name('incidencias.lista');
Route::get('/incidencias','HitoController@index')->name('incidencias');
Route::get('/transportaciones/{id}/incidencia','HitoController@create')
      ->name('incidencias.create');
Route::post('/transportaciones/{transportacion}/incidencia','HitoController@store');
Route::get('/{hito}/editar','HitoController@edit')->name('incidencias.edit');
Route::put('/{hito}','HitoController@update')->name('incidencias.update');
Route::delete('/{hito}','HitoController@destroy')->name('incidencias.destroy');
});

Route::group([
    'prefix'=>'transportaciones',
    'middleware'=>'auth'
],
function(){
Route::post('/añadir/arrastre/{transportacion}','ArrasrtreTranspController@store')
      ->name('transportaciones.arrastres');
Route::delete('/{id}/arrastretransp','ArrasrtreTranspController@destroy')
    ->name('arrastretransp.destroy');
Route::post('/añadir/envase/','ArrasrtreTranspEnvaController@store')
    ->name('transportaciones.envases');
Route::delete('/{id}/arrastreenv','ArrasrtreTranspEnvaController@destroy')
    ->name('arrastreenvase.destroy');
Route::post('/añadir/chofer/{transportacion}','ChoferEquipoTranspController@store')
      ->name('transportaciones.choferes');
Route::delete('/{id}/chofertransp','ChoferEquipoTranspController@destroy')
    ->name('chofertransp.destroy');
});



//Rutas de transferencia enviadas
Route::group([
    'prefix'=>'tenv',
    'middleware'=>'auth'
],
function(){
Route::get('/{id}/crear','TransfEnviadaController@create')->name('tenv.create');
Route::post('/{id}/crear','TransfEnviadaController@store');
Route::get('/{id}/transportacion','TransfEnviadaController@index')->name('tenv');
Route::get('/recibidas','TransfEnviadaController@index2')->name('tenv.recibidas');
Route::get('/todas','TransfEnviadaController@index3')->name('tenv.todas');
Route::get('/{transferencia}','TransfEnviadaController@show')->name('tenv.show');
Route::get('/{transferencia}/detalles','TransfEnviadaController@detalles')->name('tenv.detalles');
Route::get('/{id}/editar','TransfEnviadaController@edit')->name('tenv.edit');
Route::put('/{transfEnviada}','TransfEnviadaController@update')->name('tenv.update');
Route::get('/{id}/recibir','TransfEnviadaController@editRecibo')->name('tenv.recibir');
Route::put('/{transfEnviada}/recibir','TransfEnviadaController@updateRecibo')->name('tenv.update.recibo');
Route::delete('/{id}/eliminar','TransfEnviadaController@destroy')->name('tenv.destroy');
});

//
Route::group([
    'prefix'=>'tenv/prod',
    'middleware'=>'auth'
],
function(){
Route::post('/{id}','TransfEnvProdController@store')->name('tenv.storeproducto');
Route::get('/{id}/llenar','TransfEnvProdController@create')->name('tenv.llenar');
Route::get('/{id}/editar','TransfEnvProdController@edit')->name('tenv.prod.edit');
Route::put('/{id}/','TransfEnvProdController@update')->name('tenv.prod.update');
Route::delete('/{id}/','TransfEnvProdController@destroy')->name('tenv.prod.destroy');

});

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
Route::put('/{tipoUnidadMedida}/activar','TipoUnidadMedidaController@activar')->name('tipounidad.activar');
Route::delete('/{tipoUnidadMedida}','TipoUnidadMedidaController@destroy')->name('tipounidad.destroy');
Route::get('/desactivados','TipoUnidadMedidaController@desactivados')->name('tipounidad.desactivados');
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
Route::put('/{tipoArrastre}/activar','TipoArrastreController@activar')->name('tipoarrastre.activar');
Route::delete('/{tipoArrastre}','TipoArrastreController@destroy')->name('tipoarrastre.destroy');
Route::get('/desactivados','TipoArrastreController@desactivados')->name('tipoarrastre.desactivados');
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
Route::put('/{unidadMedida}/activar','UnidadMedidaController@activar')->name('unidadmedida.activar');
Route::delete('/{unidadMedida}','UnidadMedidaController@destroy')->name('unidadmedida.destroy');
Route::get('/desactivados','UnidadMedidaController@desactivados')->name('unidadmedida.desactivados');
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
// Route::get('/{id}','TipoHitoController@show')->name('tipohito.show');
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
Route::put('/{tipoEquipo}/activar','TipoEquipoController@activar')->name('tipoequipo.activar');
Route::delete('/{tipoEquipo}','TipoEquipoController@destroy')->name('tipoequipo.destroy');
Route::get('/desactivados','TipoEquipoController@desactivados')->name('tipoequipo.desactivados');
});

Route::group([
    'middleware'=>'auth'
],
function(){
Route::resource('directivo','DirectivoController',['except'=>'show']);
//Route::resource('user','UsersController');
Route::get('/trazas', 'TrazasController@index')->name('trazas');
});

Route::group([
    'prefix'=>'directivo',
    'middleware'=>'auth'
],
function(){
Route::put('/{directivo}/activar','DirectivoController@activar')->name('directivo.activar');
Route::delete('/{directivo}','DirectivoController@destroy')->name('directivo.destroy');
Route::get('/desactivados','DirectivoController@desactivados')->name('directivo.desactivados');
});

Route::group([
    'prefix'=>'user',
    'middleware'=>'auth'
],
function(){
Route::get('/','UsersController@index')->name('user.index');
Route::get('/crear','UsersController@create')->name('user.create');
Route::post('/crear','UsersController@store')->name('user.store');
Route::get('/{user}/show','UsersController@show')->name('user.show');
Route::get('/{user}/editar','UsersController@edit')->name('user.edit');
Route::put('/{user}','UsersController@update')->name('user.update');

Route::put('/{user}/activar','UsersController@activar')->name('user.activar');
Route::delete('/{user}','UsersController@destroy')->name('user.destroy');
Route::get('/desactivados','UsersController@desactivados')->name('user.desactivados');
});

Route::resource('roles','RolesController',['except'=>'show','as'=>'admin']);

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

