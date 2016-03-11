<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('tesista','TesistaController@index');
    Route::get('crearTesista','TesistaController@create'); //te redirige a la pantalla de crear datos
    Route::post('tesistas','TesistaController@store'); //guarda los datos y te redirige al index
    Route::get('tesista/editar/{id}','TesistaController@edit'); //Te redirige a la vista editar con los datos de existir luego de darle al boton
    Route::post('actualizarTesista/{id}','TesistaController@update'); //guarda los datos modificados y te redirige al index
    Route::delete('tesista/eliminar/{id}','TesistaController@destroy');


//Rutas para usuarios

    Route::get('usuario','UserController@index');
    Route::get('crearUsuario','UserController@create');
    Route::post('usuarios','UserController@store');
    Route::get('usuario/editar/{id}','UserController@edit');
    Route::post('actualizarUsuario/{id}','UserController@update');
    Route::delete('usuario/eliminar/{id}','UserController@destroy');

//Rutas para representante

    Route::get('representante','RepresentanteController@index');
    Route::get('crearRepresentante','RepresentanteController@create');
    Route::post('representantes','RepresentanteController@store');
    Route::get('representante/editar/{id}','RepresentanteController@edit');
    Route::post('actualizarRepresentante/{id}','RepresentanteController@update');
    Route::delete('representante/eliminar/{id}','RepresentanteController@destroy');

//Rutas para actividad

    Route::get('actividad','ActividadController@index');
    Route::get('crearActividad','ActividadController@create');
    Route::post('actividades','ActividadController@store');
    Route::get('actividad/editar/{id}','ActividadController@edit');
    Route::post('actualizarActividad/{id}','ActividadController@update');
    Route::delete('actividad/eliminar/{id}','ActividadController@destroy');

//rutas para sector de actividades

    Route::get('sectorActividad','SectorActividadController@index');
    Route::get('crearSectorActividad','SectorActividadController@create');
    Route::post('sectorActividades','SectorActividadController@store');
    Route::get('sectorActividad/editar/{id}','SectorActividadController@edit');
    Route::post('actualizarSectorActividad/{id}','SectorActividadController@update');
    Route::delete('sectorActividad/eliminar{id}','SectorActividadController@destroy');


//rutas para Institucion


    Route::get('institucion','InstitucionController@index');
    Route::get('institucion/crear','InstitucionController@create');
    Route::post('institucion/guardar','InstitucionController@store');
    Route::get('institucion/editar/{id}','InstitucionController@edit');
    Route::post('institucion/edita/{id}','InstitucionController@update');
    Route::get('institucion/eliminar/{id}','InstitucionController@destroy');
    Route::post('institucion/buscar','InstitucionController@buscar');


//rutas para Departamento


    Route::get('departamento','DepartamentoController@index');
    Route::get('departamento/crear','DepartamentoController@create');
    Route::post('departamento/guardar','DepartamentoController@store');
    Route::get('departamento/editar/{id}','DepartamentoController@edit');
    Route::post('departamento/edita/{id}','DepartamentoController@update');
    Route::get('departamento/eliminar/{id}','DepartamentoController@destroy');
    Route::post('departamento/buscar','DepartamentoController@buscar');


//rutas para muestras



    Route::get('muestras','MuestraController@index');
    Route::get('muestras/crear','MuestraController@create');
    Route::post('muestras/guardar','MuestraController@store');
    Route::post('muestras/ajaxvalidar','MuestraController@ajaxvalidar');
    Route::post('muestras/ajaxborrarimg','MuestraController@borrar_img');
    Route::post('muestras/ajaxrelacionesact','MuestraController@relacionesact');
    Route::post('muestras/buscar','MuestraController@buscarbdd');
    Route::post('muestras/buscarfiltro','MuestraController@buscar_filtros');
    Route::get('muestras/buscarfiltro','MuestraController@buscar_filtros');
    Route::get('muestras/lista','MuestraController@listar');
    Route::get('muestras/editar/{id}','MuestraController@edit');
    Route::get('muestras/detalles/{id}','MuestraController@details');
    Route::post('muestras/edita/{id}','MuestraController@update');
    Route::delete('muestras/eliminar{id}','MuestraController@destroy');



    //Route::get('/home', 'HomeController@index');
});


//rutas para los tesista

//ruta de prueba

Route::get('prueba', function(){return "hola";});