<?php

use App\Http\Controllers\AlquilerController;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ParkController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ScreensController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\LoadEditController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GraficosController;

use App\Http\Controllers\RegisteredUserController;


Route::get('/', function () {
    return view('auth.login');
});





Auth::routes(['register' => true]); // Habilitar registro


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/user/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/user/register', [RegisteredUserController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    // Todas las rutas protegidas aquí


    Route::get('/dashboard', [App\Http\Controllers\CustomerController::class, 'index'])->name('.dashboard');

    //Route::get('home', [App\Http\Controllers\HomeController::class,'index'])->name('home');

    /**
     * Declaracion de rutas
     */

    /**ruta park */
    Route::get('/park', [App\Http\Controllers\ScreensController::class, 'park'])->name('.park');

    Route::resource('/parks', App\Http\Controllers\ScreensController::class)->names('park');

    Route::resource('/customers', CustomerController::class)->names('customer');

    //Route::PATCH('/Upark{edit}', [App\Http\Controllers\ParkController::class, 'edit'])->name('Upark.edit');

    //Route::post('/Upark/show-single-row', [ParkController::class, 'processSingle'])->name('park.process.single');

    /**RUTA DE EDICION EQUIPOS Upark */
    Route::get('/Upark/form', [ParkController::class, 'showForm'])->name('itemsPark.form');

    Route::put('/Upark{id}/update', [App\Http\Controllers\ParkController::class, 'update'])->name('Upark.update');

    /**new device */
    Route::post('install', [App\Http\Controllers\ParkController::class, 'store'])->name('park.store');


    /**ruta lecturas */
    Route::get('/lead', [App\Http\Controllers\ScreensController::class, 'lead'])->name('.lead');

    /**edicion de lecturas */

    /**RUTA DE EDICION PARA CONTRATOS ALQUILER */
    Route::get('LoadEdit/form-lecturas', [LoadEditController::class, 'showLoadEdit'])->name('showLoad.edit');

    Route::put('/LoadEdit{update}', [LoadEditController::class, 'LoadUpdate'])->name('Load.update');

    Route::put('/VContact{cliente}', [App\Http\Controllers\ScreensController::class, 'update'])->name('VContact.update');


    /**RUTAS PARA LA IMPORTACION DE LECTURAS */

    /**ruta lectura general */
    Route::get('/Lgeneral', [App\Http\Controllers\ScreensController::class, 'Lgeneral'])->name('Lgeneral');

    Route::resource('Lgenals', App\Http\Controllers\ScreensController::class)->names('Lgenal');


    /**CARGA LECTURAS MANUALES */
    Route::post('Lcustomer', [App\Http\Controllers\LecturaManualController::class, 'store'])->name('LCustomer.lecturaManual.store');

    Route::get('/LCustomer{show}', [App\Http\Controllers\ScreensController::class, 'show'])->name('LCustomer');




    /**ruta contact */
    Route::get('/contact', [App\Http\Controllers\ScreensController::class, 'contact'])->name('contact');

    Route::get('new_contact', [App\Http\Controllers\ScreensController::class, 'new_contact'])->name('new_contact');




    /**ruta segun su id */
    Route::get('/VContact{cliente}', [App\Http\Controllers\ScreensController::class, 'edit'])->name('VContact.edit');

    Route::put('/VContact{cliente}', [App\Http\Controllers\ScreensController::class, 'update'])->name('VContact.update');

    Route::post('new_contact', [App\Http\Controllers\CustomerController::class, 'store'])->name('new_contact.store');



    /**ruta contrac */
    Route::get('contract', [App\Http\Controllers\ScreensController::class, 'contract'])->name('contract');




    /**ruta install device new park */
    Route::get('/install', [App\Http\Controllers\ScreensController::class, 'install'])->name('install');

    Route::post('install', [App\Http\Controllers\ParkController::class, 'storePark'])->name('install.store');


    /**RUTA DESINSTALATION */
    Route::get('desinstalation', [App\Http\Controllers\DesinstalationController::class, 'indexDesinstalation'])->name('desinstalation');

    /**RUTA PARA CARGAR EQUIPOS DESISNTALADOS */
    Route::get('new_desin', [App\Http\Controllers\DesinstalationController::class, 'createDesinstalation'])->name('create.desinstalation');

    /**RUTA PARA CARGAR LAS CARTAS DE INSTALACIONES  */
    Route::post('new_desin', [App\Http\Controllers\DesinstalationController::class, 'storeDesinstalation'])->name('desinstalation.store');

    Route::get('/edit_desins/form', [App\Http\Controllers\DesinstalationController::class, 'showForm'])->name('itemsDesins.form');

    /**RUTA PARA ACTUALIZACION DE REGISTROS DESINSTALACION */
    Route::put('/edit_desins{id}/update', [App\Http\Controllers\DesinstalationController::class, 'update'])->name('desinstalation.update');




    /**NEW CONTRACT ALQUILER */
    Route::get('Alquiler', [App\Http\Controllers\AlquilerController::class, 'store'])->name('Alquiler.store');

    Route::post('Alquiler', [App\Http\Controllers\AlquilerController::class, 'create'])->name('Alquiler.create');

    Route::get('edit_alquiler{edit}', [App\Http\Controllers\AlquilerController::class, 'edit'])->name('edit_alquiler.edit');

    /**RUTA DE EDICION PARA CONTRATOS ALQUILER */
    Route::get('edit_alquiler/form-alquilers', [AlquilerController::class, 'showAlquilerEdit'])->name('showAlquiler.edit');

    Route::put('edit_alquiler{update}', [App\Http\Controllers\AlquilerController::class, 'update'])->name('edit_alquiler.update');





    /**ruta para generar las ordenes */
    Route::get('Orden{edit}', [App\Http\Controllers\OrdenController::class, 'edit'])->name('orden.edit');

    /**calculo */
    Route::get('Orden', [App\Http\Controllers\CalculoController::class, 'calculo'])->name('Orden.calculo');

    /**Create Orden */
    Route::post('Orden/{id}', [App\Http\Controllers\OrdenController::class, 'create'])->name('orden.create');

    /**Ruta Invoices */
    ROute::get('Orden/{ordens}/generateInvoice', [App\Http\Controllers\OrdenController::class, 'generateInvoices'])->name('orden.generateInvoices');


    /**ruta RFLTQ */
    Route::get('RFLTQ', [App\Http\Controllers\RFController::class, 'index'])->name('RFLTQ');

    Route::get('/actualizar-fact-odoo', [OrdenController::class, 'updateFactOdoo'])->name('LCustomer.factOdoo');

    /**RUTA PARA EXPORTACION DE LECTURAS POR CLIENTE */
    Route::post('/exportar-csv', [ExportController::class, 'exportToCSV'])->name('export.csv');

    /**RUTAS PARA EXPORTACION DE LECTURAS GENERALES */
    Route::post('exportars-csv', [ExportController::class, 'exportGeneralCSV'])->name('export_general.csv');

    /**RUTA PARA EXPORTAR DATOS DEL PARQUE */
    Route::post('exportars-parks-csv', [ExportController::class, 'exportGeneralParks'])->name('export_parks.csv');




    /**RUTA PARA LA CARGA */

    /**IMPORT CSV LECTURAS POR CLIENTE */
    Route::get('ImpCustomer', [App\Http\Controllers\ImportController::class, 'form'])->name('form');

    Route::post('ImpCustomer', [App\Http\Controllers\ImportController::class, 'import'])->name('');



    /**RUTA DE MANTENIMIENTO */
    Route::get('mantenimiento', [App\Http\Controllers\ScreensController::class, 'mantenimiento'])->name('mantenimiento');


    /**RUTA PARA LAYOUTS PERFIL USUARIOS */
    Route::get('Perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('perfil.index');



    /**RUTA PARA LA EDICION DE INFORMACION PERSONAL EN PERFIL */
    Route::put('/Perfil{edit}', [App\Http\Controllers\PerfilController::class, 'updateInfoPer'])->name('perfil_update_info');

    Route::get('user_manager', [App\Http\Controllers\PerfilController::class, 'userManagerIndex'])->name('userManager.index');


/*
   Route::get('/user_manager', [RegisteredUserController::class, 'registerUsers'])
    ->middleware(['auth', \App\Http\Middleware\AdminAccess::class])
    ->name('userManager.index');*/

   
    /**RUTA NUEVO USUARIO */
    Route::get('new_user', [App\Http\Controllers\PerfilController::class, 'showNewUser'])->name('new_user_show');

    /**RUTA PARA EDICION DE USUARIOS */
    Route::get('edit_user/form-edit-user', [App\Http\Controllers\PerfilController::class, 'showEditUser'])->name('edit_user_show');

    Route::post('/sumar-volumen', [App\Http\Controllers\OrdenController::class, 'sumarVolumen'])->name('sumar.volumen');



    /**RUTA DOCUMENTATION */
    Route::get('showDoc', [App\Http\Controllers\DocumentController::class, 'DocIndex'])->name('showDoc.index');

    /**RUTA DE DOCUMENTACION SEGUN EL idCodigo*/
    Route::get('DocIdShow/{idCodigo}', [App\Http\Controllers\DocumentController::class, 'DocIdShow'])->name('DocIdShow.show');





    /**RUTA PARA ACTUALIZAR CONTACTOS */
    Route::get('/VContact/form', [ContactosController::class, 'showForm'])->name('items.form');

    /**RUTA PARA CREAR CONTACTOS */
    Route::post('new_contact', [ContactosController::class, 'create'])->name('create.contact');



    /**RUTA PARA ELIMINAR ORDENES */
    Route::delete('/ordens/{id}', [OrdenController::class, 'destroy'])->name('ordens.destroy');

    /**RUTA PARA ELIMINAR LOS EQUIPOS INSTALADOS */
    Route::delete('/parks/{id}', [ScreensController::class, 'destroy'])->name('parks.destroy');

    /**RUTA PARA ELIMINAR LOS USUARIOS CREADOS PARA ACCEDER AL SISTEMA */
    Route::delete('/user_manager/{id}', [PerfilController::class, 'destroy'])->name('user_manager.destroy');

    /**RUTA PARA ELIMINAR LOS CONTRATOS CADUCADOS */
    Route::delete('/contract/{id}', [ScreensController::class, 'destroyContract'])->name('contract.destroy');

    /**RUTA PARA ELIMINAR LAS LECTURAS EN CASO DE ALGUNA CARGA ERRONEA */
    Route::delete('/Lgenals/{id}', [ScreensController::class, 'destroyLgenals'])->name('lgenals.destroy');
    
    /**RUTA PARA ELIMINAR LOS CONTACTOS */
    Route::delete('/contact/{id}', [ScreensController::class, 'destroyContact'])->name('contact.destroy');



    /**RUTA PARA GENERAR LOS GRAFICOS */
    Route::get('/graficos', [GraficosController::class, 'indexG']);



    /**RUTA PARA MOVIMIENTOS */
    Route::get('movimientos', [ScreensController::class, 'movimiento'])->name('movimiento.blade');

});



Auth::routes();



//Route::put('/Upark{edit}', [App\Http\Controllers\ParkController::class,'update'])->name('Upark.update');
