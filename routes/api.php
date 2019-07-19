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
Route::resource('areas','AdminApi\AreasController',['only'=>['index','show']]);
Route::resource('estados_operacion','AdminApi\EstadoOperacionController',['only'=>['index','show']]);
Route::resource('estadosProceso','AdminApi\EstadosProcesoController',['only'=>['index','show']]);


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
