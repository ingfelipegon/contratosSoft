<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('areas','AdminApi\AreasController');
Route::resource('estadosOperacion','AdminApi\EstadosOperacionController',['only'=>['index','show']]);
Route::resource('estadosProceso','AdminApi\EstadosProcesoController',['only'=>['index','show']]);
Route::resource('estadosCustodia','AdminApi\EstadosCustodiaController',['only'=>['index','show']]);
Route::resource('meses','AdminApi\MesesController',['only'=>['index','show']]);
Route::resource('etapas','AdminApi\EtapasController',['only'=>['index','show']]);
Route::resource('fuentes','AdminApi\FuentesController',['only'=>['index','show']]);
Route::resource('modalidades','AdminApi\ModalidadesController',['only'=>['index','show']]);
Route::get('modalidadesPostcontractual','AdminApi\ModalidadesController@modalidadesPostcontractual');
Route::resource('tiposIdentificacion','AdminApi\TipoIdentificacionController',['only'=>['index','show']]);
Route::resource('tiposTramite','AdminApi\TipoTramiteController',['only'=>['index','show']]);
Route::resource('unidades','AdminApi\UnidadController',['only'=>['index','show']]);
// Route::resource('adquisiciones','AdminApi\AdquisicionesController');
Route::resource('adquisiciones.logAdquisiciones','AdminApi\AdquisicionLogAdquisicionesController',['only'=>['index','show']]);
// Route::resource('solicitudes','AdminApi\SolicitudesController');
Route::resource('solicitudes.logSolicitudes','AdminApi\SolicitudLogSolicitudesController',['only'=>['index','show']]);
Route::resource('solicitudesPostcontractual','AdminApi\SolicitudesPostcontractualController');
Route::get('solicitudesPrePost','AdminApi\SolicitudesController@solicitudesPrePost');
Route::resource('custodias','AdminApi\CustodiaController');
Route::resource('solicitudes.movimientos','AdminApi\SolicitudMovimientoController',['only'=>['index','show']]);
Route::resource('solicitudes.etapas','AdminApi\SolicitudMovimientosEtapasController',['only'=>['index']]);
Route::get('verificar_registro_PAA/{item}', 'AdminApi\SolicitudesController@verificar_registro_PAA');
Route::get('verificar_registro_PAA_solicitud/{item}', 'AdminApi\SolicitudesPostcontractualController@verificar_registro_PAA_solicitud');
Route::get('showfiles/{item}', 'AdminApi\ArchivoController@showfiles');
Route::get('descarga/{id}/{nombre}', 'AdminApi\ArchivoController@show');
Route::get('descarga/{nombre}', 'AdminApi\ArchivoController@showBiblioteca');
Route::resource('movimientos','AdminApi\MovimientoController');
Route::resource('movimientos.observaciones','AdminApi\MovimientoObservacionesController',['only'=>['index','show']]);
Route::get('obtener_dias_etapa/{idModaldad}/{idEtapa}', 'AdminApi\MovimientoController@obtenerDiasEtapa');
Route::get('obtener_id_adquisicion/{item}', 'AdminApi\AdquisicionesController@obtenerIdAdquisicion');
Route::post('oauth/token','\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');

//TRASLADOS
Route::resource('personas.bloques','Traslado\PersonaBloqueController',['only'=>['index']]);



Route::apiResource('users', 'AdminApi\UserController');
Route::apiResource('roles', 'AdminApi\RoleController');
Route::apiResource('permissions', 'AdminApi\PermissionController');
Route::apiResource('abogados', 'AdminApi\AbogadosController');
Route::apiResource('atencion_victimas', 'AdminApi\AtencionVictimasController');
Route::apiResource('tipo_documentos', 'AdminApi\TipodocumentosController');
Route::apiResource('sexos', 'AdminApi\SexosController');
Route::apiResource('departamentos', 'AdminApi\DepartamentosController');
Route::apiResource('bloques', 'AdminApi\BloquesController');
Route::apiResource('frentes', 'AdminApi\FrentesController');
// Route::apiResource('municipios', 'AdminApi\MunicipiosController');
Route::get('municipios/{department}', 'AdminApi\MunicipiosController@listar_municipios');
Route::get('verifica_identificacion/{identificacion}', 'AdminApi\AtencionVictimasController@verificar_identificacion');

Route::apiResource('generos', 'AdminApi\GenerosController');
Route::apiResource('etnias', 'AdminApi\EtniasController');
Route::apiResource('enfoques_abogado', 'AdminApi\EnfoquesabogadoController');
Route::apiResource('tipos_abogado', 'AdminApi\TiposabogadoController');
Route::post('uploadFile','AdminApi\FileController@uploadFile');
