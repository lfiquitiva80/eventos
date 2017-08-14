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
    return view('auth.login');
});



	


Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });




Route::get('pdf', 'PDFcontroller@index');

Route::get('certificado/{id}', 'PDFcontroller@Certificado')->name('certificado');

Route::resource('eventos_general','eventosGeneralController');

Route::resource('plantilla','plantillaController');

Route::get('/inicio', 'principalController@indexinicio')->name('inicio');

Route::resource('reportes', 'reportesController');

Route::get('/todos', 'principalController@indexall');

Route::get('/eventoscreate', 'principalController@create');

Route::get('/tematica', 'principalController@atematica')->name('tematica');

Route::post('savetematica', 'evento_areatematicaController@storenew')->name('editartematica');

Route::get('info', 'principalController@info');

Route::get('integrantes', 'principalController@participantes');

Route::get('ticket', 'principalController@ticket');

Route::get('send', 'principalController@email');

Route::get('email', 'emailController@index');

Route::get('emailparticipantes', 'emailController@enviarparticipantes');

Route::get('partevento', 'emailController@partevento');

Route::get('enviarcorreo/{id}', 'emailController@enviarcorreo');

Route::get('correoparticipantes/{id}', 'emailController@editmailsparticipantes')
->name('correoparticipantes');

Route::get('emaileditar/{id}', 'emailController@edit');

Route::get('emailparticipante', 'emailController@enviarparticipante');

Route::resource('participantes','participantesController');

Route::resource('area_tematica','areaTematicaController');

Route::resource('departamento','departamentoController');

Route::resource('evento_areatematica','evento_areatematicaController');

Route::resource('participantesevento','participanteseventoController');

Route::get('editarevento/{id}', 'participanteseventoController@editarevento');

Route::get('updateplantilla/{id}', 'participanteseventoController@updateplantilla')->name('actualizarplantilla');

Route::get('homeprincipal', 'HomeController@index')->name('buscar');

Route::patch('actualizarasistencia/{id}', 'HomeController@update')->name('actualizarasistencia');

Route::resource('funcionarios','funcionariosController');

Route::resource('municipios','municipiosController');

Route::resource('paises','paisesController');

Route::resource('tipo_participacion','tipo_participacionController');

Route::resource('tiquetes','tiquetesController');

Route::resource('paises','paisesController');

Route::resource('excel', 'excelController');

Route::get('excelparticipantes/{id}', 'excelController@excelparticipantes')->name('xlsparticipantes');

Route::get('excelparticipantesall', 'excelController@excelparticipantesall')->name('xlsparticipantesall');
	
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
