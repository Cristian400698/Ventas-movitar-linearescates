<?php

use App\Http\Controllers\linearescateController;
use App\Http\Controllers\phoenixController;
use Illuminate\Support\Facades\Route;

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
    return view('/welcome');
});

//**DATOS DE UUARIOS **/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {

    Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');
    Route::get('User-list-excel', 'App\Http\Controllers\UserController@exportExcel')->name('User.excel');
    Route::get('/searchuser', 'App\Http\Controllers\UserController@searchuser');

    //** DATOS DEL APLICATIVO **//

    Route::resource('perfil', App\Http\Controllers\PerfilController::class);
    Route::resource('historial', App\Http\Controllers\HistorialController::class);
    Route::resource('permissions', App\Http\Controllers\permissionController::class);
    Route::resource('roles', App\Http\Controllers\rolesController::class);

    //** AUTO SERVER**//

    Route::resource('planes', App\Http\Controllers\planesController::class);
    Route::get('/planes/import', [App\Http\Controllers\planesImportController::class, 'show']);
    Route::post('/planes/import', [App\Http\Controllers\planesImportController::class, 'store']);


    //** NUEVOS**//
    /* INICIO PORTA */
    Route::resource('inicio', App\Http\Controllers\inicioController::class);
    Route::resource('porta', App\Http\Controllers\portabilidadinboundController::class);
    Route::resource('estados', App\Http\Controllers\estadosportinbController::class);
    Route::resource('portadigital', App\Http\Controllers\postabilidaddigitalController::class);
    Route::resource('estadosportdigi', App\Http\Controllers\estadosportdigiController::class);
    Route::resource('portatelev', App\Http\Controllers\portatelevController::class);
    Route::resource('estadosportatelev', App\Http\Controllers\estadosportatelevController::class);
    Route::resource('perdidaportainbound', App\Http\Controllers\PortaInboundPerdida::class);
    Route::resource('perdidaportadigital', App\Http\Controllers\PortaDigitalPerdida::class);
    Route::resource('perdidaportateleventas', App\Http\Controllers\PortaTeleventasPerdida::class);

    /* FIN PORTA */

    /* INICIO UPGRADE */
    Route::resource('inicioupgrade', App\Http\Controllers\inicioupgradeController::class);
    Route::resource('upgradeinbo', App\Http\Controllers\upgradeController::class);
    Route::resource('upgradetelev', App\Http\Controllers\upgradetelevsController::class);
    Route::resource('upgradedigi', App\Http\Controllers\upgradedigiController::class);
    Route::resource('perdidaupgradeinbound', App\Http\Controllers\UpgradeInboundPerdida::class);
    Route::resource('perdidaupgradedigital', App\Http\Controllers\UpgradeDigitalPerdida::class);
    Route::resource('perdidaupgradeteleventa', App\Http\Controllers\UpgradeTeleventaPerdida::class);
    Route::resource('estadoupgradeinbound', App\Http\Controllers\EstadoUpgradeInbound::class);
    Route::resource('estadoupgradedigital', App\Http\Controllers\EstadoUpgradeDigital::class);
    Route::resource('estadoupgradeteleventa', App\Http\Controllers\EstadoUpgradeTeleventa::class);

    /* FIN UPGRADE */

    /* INICIO PREPOST */
    Route::resource('inicioprepost', App\Http\Controllers\inicioprepostController::class);
    Route::resource('prepostdigital', App\Http\Controllers\prepostdigitalController::class);
    Route::resource('prepostinbound', App\Http\Controllers\prepostinboundController::class);
    Route::resource('preposteleventa', App\Http\Controllers\preposteleventaController::class);
    Route::resource('perdidaprepostinbound', App\Http\Controllers\PrepostInboundPerdida::class);
    Route::resource('perdidaprepostdigital', App\Http\Controllers\PrepostDigitalPerdida::class);
    Route::resource('perdidaprepostteleventa', App\Http\Controllers\PrepostTeleventaPerdida::class);
    Route::resource('estadoprepostinbound', App\Http\Controllers\EstadoPrepostInbound::class);
    Route::resource('estadoprepostdigital', App\Http\Controllers\EstadoPrepostDigital::class);
    Route::resource('estadoprepostteleventa', App\Http\Controllers\EstadoPrepostTeleventa::class);
    /* FIN PREPOST */

    /* INICIO FIJA */
    Route::resource('iniciofija', App\Http\Controllers\iniciofijaController::class);
    Route::resource('fijadigital', App\Http\Controllers\fijadigitalController::class);
    Route::resource('fijainbound', App\Http\Controllers\fijainboundController::class);
    Route::resource('fijateleventa', App\Http\Controllers\fijateleventaController::class);
    Route::resource('perdidafijainbound', App\Http\Controllers\FijaInboundPerdida::class);
    Route::resource('perdidafijadigital', App\Http\Controllers\FijaDigitalPerdida::class);
    Route::resource('perdidafijateleventa', App\Http\Controllers\FijaTeleventaPerdida::class);
    Route::resource('estadofijainbound', App\Http\Controllers\EstadoFijaInbound::class);
    Route::resource('estadofijadigital', App\Http\Controllers\EstadoFijaDigital::class);
    Route::resource('estadofijateleventa', App\Http\Controllers\EstadoFijaTeleventa::class);

    /* INICIO COMUNIDAD EMPRESARIAL */

    Route::resource('iniciocomunidad', App\Http\Controllers\InicioComunidadController::class);
    Route::resource('comunidad', App\Http\Controllers\ComunidadEmpresarialController::class);
    Route::resource('estadoscomunidad', App\Http\Controllers\EstadoComunidadController::class);
    Route::resource('perdidacomunidad', App\Http\Controllers\PerdidasComunidadController::class);
    Route::get('comunidad.excel', 'App\Http\Controllers\ComunidadEmpresarialController@exportExcel')->name('comunidad.excel');
    Route::get('searchcomunidad', [App\Http\Controllers\ComunidadEmpresarialController::class, 'searchcomunidad']);

    /* INICIO TEN TEN  PORTABILIDAD*/
    Route::resource('iniciotenten', App\Http\Controllers\InicioTentenController::class);
    Route::resource('tentenportabilidad', App\Http\Controllers\TenPortabilidadController::class);
    Route::get('tentenportabilidad.excel', 'App\Http\Controllers\TenPortabilidadController@exportExcel')->name('tentenportabilidad.excel');
    Route::get('searchtentenportabilidad', [App\Http\Controllers\TenPortabilidadController::class, 'searchtentenportabilidad']);
    Route::resource('EstadosTentenPortabilidad', App\Http\Controllers\EstadosTentenPortabilidadController::class);
    Route::resource('PerdidaTentenPortabilidad', App\Http\Controllers\PerdidaTentenPortabilidadController::class);

    /* INICIO TEN TEN  MIGRACION*/
    Route::resource('tentenmigracion', App\Http\Controllers\TenMigracionController::class);
    Route::get('tentenmigracion.excel', 'App\Http\Controllers\TenMigracionController@exportExcel')->name('tentenmigracion.excel');
    Route::get('searchtentenmigracion', [App\Http\Controllers\TenMigracionController::class, 'searchtentenmigracion']);
    Route::resource('Estadostentenmigracion', App\Http\Controllers\EstadosTentenMigracionController::class);
    Route::resource('PerdidaTentenMigracion', App\Http\Controllers\PerdidaTentenMigracionController::class);

    /* INICIO TEN TEN  PREPOS*/
    Route::resource('tentenprepos', App\Http\Controllers\TenPreposController::class);
    Route::get('tentenprepos.excel', 'App\Http\Controllers\TenPreposController@exportExcel')->name('tentenprepos.excel');
    Route::get('searchtentenprepo', [App\Http\Controllers\TenPreposController::class, 'searchtentenprepo']);
    Route::resource('Estadostentenprepos', App\Http\Controllers\EstadosTentenPreposController::class);
    Route::resource('PerdidaTentenPrepos', App\Http\Controllers\PerdidaTentenPreposController::class);

    /* INICIO RECHAZOS */
    Route::resource('rechazos', App\Http\Controllers\rechazosController::class);
    /* FIN RECHAZOS */

    /* INICIO PHOENIX*/
    Route::resource('phoenix', App\Http\Controllers\phoenixController::class);
    Route::resource('phoenixperdida', App\Http\Controllers\PhoenixPerdida::class);
    /* FIN PHOENIX*/

    /* INICIO LINEA NUEVA*/
    Route::resource('lineanueva', App\Http\Controllers\lineanuevaController::class);
    Route::resource('lineanuevaperdida', App\Http\Controllers\LineaNuevaPerdida::class);
    /* FIN LINEA NUEVA*/

    /* INICIO COBERTURA */
    Route::resource('cobertura', App\Http\Controllers\CoberturaController::class);
    Route::get('/Cobertura/import', [App\Http\Controllers\CoberturaImportController::class, 'show']);
    Route::post('/Cobertura/import', [App\Http\Controllers\CoberturaImportController::class, 'store']);
    /* FIN COBERTURA */

    /* BUSCADORES */
    /* Bucador porta */
    Route::get('searchinboundperdida', [App\Http\Controllers\PortaInboundPerdida::class, 'searchinboundperdida']);
    Route::get('searchdigitalperdida', [App\Http\Controllers\PortaDigitalPerdida::class, 'searchdigitalperdida']);
    Route::get('searchteleventaperdida', [App\Http\Controllers\PortaTeleventasPerdida::class, 'searchteleventaperdida']);
    Route::get('searchinboundback', [App\Http\Controllers\portabilidadinboundController::class, 'searchinboundback']);
    Route::get('searchdigitalback', [App\Http\Controllers\postabilidaddigitalController::class, 'searchdigitalback']);
    Route::get('searchteleventaback', [App\Http\Controllers\portatelevController::class, 'searchteleventaback']);
    /* buscador Upgrade */
    Route::get('searchinboundupgrade', [App\Http\Controllers\upgradeController::class, 'searchinboundupgrade']);
    Route::get('searchdigiupgrade', [App\Http\Controllers\upgradedigiController::class, 'searchdigiupgrade']);
    Route::get('searchteleupgrade', [App\Http\Controllers\upgradetelevsController::class, 'searchteleupgrade']);
    Route::get('searchinboundperdidaupgrade', [App\Http\Controllers\UpgradeInboundPerdida::class, 'searchinboundperdidaupgrade']);
    Route::get('searchdigitalperdidaupgrade', [App\Http\Controllers\UpgradeDigitalPerdida::class, 'searchdigitalperdidaupgrade']);
    Route::get('searchteleperdidaupgrade', [App\Http\Controllers\UpgradeTeleventaPerdida::class, 'searchteleperdidaupgrade']);
    /* buscador Prepost */
    Route::get('searchinboundperdidaprepost', [App\Http\Controllers\PrepostInboundPerdida::class, 'searchinboundperdidaprepost']);
    Route::get('searchdigiperdidaprepost', [App\Http\Controllers\PrepostDigitalPerdida::class, 'searchdigiperdidaprepost']);
    Route::get('searchteleperdidaprepost', [App\Http\Controllers\PrepostTeleventaPerdida::class, 'searchteleperdidaprepost']);
    Route::get('searchinnboundprepost', [App\Http\Controllers\prepostinboundController::class, 'searchinnboundprepost']);
    Route::get('searchdigiprepost', [App\Http\Controllers\prepostdigitalController::class, 'searchdigiprepost']);
    Route::get('searchteleprepost', [App\Http\Controllers\preposteleventaController::class, 'searchteleprepost']);

    /* buscador Fija */
    Route::get('searchinboundfija', [App\Http\Controllers\fijainboundController::class, 'searchinboundfija']);
    Route::get('searchdigifija', [App\Http\Controllers\fijadigitalController::class, 'searchdigifija']);
    Route::get('searchtelefija', [App\Http\Controllers\fijateleventaController::class, 'searchtelefija']);
    Route::get('searchinboundperdidafija', [App\Http\Controllers\FijaInboundPerdida::class, 'searchinboundperdidafija']);
    Route::get('searchdigiperdidafija', [App\Http\Controllers\FijaDigitalPerdida::class, 'searchdigiperdidafija']);
    Route::get('searchteleperdidafija', [App\Http\Controllers\FijaTeleventaPerdida::class, 'searchteleperdidafija']);
    /* buscador Linea nueva */
    Route::get('searchlineanuevaperdida', [App\Http\Controllers\LineaNuevaPerdida::class, 'searchlineanuevaperdida']);
    Route::get('searchlineanueva', [App\Http\Controllers\lineanuevaController::class, 'searchlineanueva']);
    /* buscador Phoenix */
    Route::get('searchphoenix', [App\Http\Controllers\phoenixController::class, 'searchphoenix']);
    Route::get('searchphoenixperdida', [App\Http\Controllers\PhoenixPerdida::class, 'searchphoenixperdida']);
    /* buscador Rechazos */
    Route::get('searchrechazos', [App\Http\Controllers\rechazosController::class, 'searchrechazos']);

    /* FIN BUSCADORES */

    /* exports excel */
    Route::get('portainbound.excel', 'App\Http\Controllers\portabilidadinboundController@exportExcel')->name('portainbound.excel');
    Route::get('portadigital.excel', 'App\Http\Controllers\postabilidaddigitalController@exportExcel')->name('portadigital.excel');
    Route::get('portatelev.excel', 'App\Http\Controllers\portatelevController@exportExcel')->name('portatelev.excel');
    Route::get('upgradeinbound.excel', 'App\Http\Controllers\upgradeController@exportExcel')->name('upgradeinbound.excel');
    Route::get('upgradedigital.excel', 'App\Http\Controllers\upgradedigiController@exportExcel')->name('upgradedigital.excel');
    Route::get('upgradeteleventa.excel', 'App\Http\Controllers\upgradetelevsController@exportExcel')->name('upgradeteleventa.excel');
    Route::get('prepostinbound.excel', 'App\Http\Controllers\prepostinboundController@exportExcel')->name('prepostinbound.excel');
    Route::get('prepostdigital.excel', 'App\Http\Controllers\prepostdigitalController@exportExcel')->name('prepostdigital.excel');
    Route::get('prepostteleventa.excel', 'App\Http\Controllers\preposteleventaController@exportExcel')->name('prepostteleventa.excel');
    Route::get('fijainbound.excel', 'App\Http\Controllers\fijainboundController@exportExcel')->name('fijainbound.excel');
    Route::get('fijadigital.excel', 'App\Http\Controllers\fijadigitalController@exportExcel')->name('fijadigital.excel');
    Route::get('fijateleventa.excel', 'App\Http\Controllers\fijateleventaController@exportExcel')->name('fijateleventa.excel');
    Route::get('lineanueva.excel', 'App\Http\Controllers\lineanuevaController@exportExcel')->name('lineanueva.excel');
    Route::get('phoenix.excel', 'App\Http\Controllers\phoenixController@exportExcel')->name('phoenix.excel');
    Route::get('rechazo.excel', 'App\Http\Controllers\rechazosController@exportExcel')->name('rechazo.excel');

    /* alto riesgo */
    Route::resource('altoriesgo', App\Http\Controllers\AltoriesgoController::class);
    Route::get('/buscador', [App\Http\Controllers\AltoriesgoController::class, 'buscador']);
    Route::get('/altoriesgoimport', [App\Http\Controllers\AltoriesgoimportController::class, 'show']);
    Route::post('/altoriesgo/import', [App\Http\Controllers\AltoriesgoimportController::class, 'store']);

    /* Ruta patinadores */

    Route::post('/patinadorportabilidad', [App\Http\Controllers\portabilidadinboundController::class, 'patinadorportabilidad'])->name('porta.patinadorportabilidad');

    /* rutas Control de supervisores */

    Route::resource('superpersonal', App\Http\Controllers\PersonalSuperController::class);

    Route::get('/searchpersonalgeneral', 'App\Http\Controllers\PersonalActivoController@searchpersonalgeneral');
    Route::get('/searchsuperpersonal', 'App\Http\Controllers\PersonalSuperController@searchsuperpersonal');
    Route::get('/searchsuperpersonalindex', 'App\Http\Controllers\PersonalSuperController@searchsuperpersonalindex');

    Route::get('hora-list-excel', 'App\Http\Controllers\PersonalSuperController@exportExcel')->name('superpersonal.excel');

    /* inicio busqueda mis ventas */

    Route::get('searchmisventasportainbound', [App\Http\Controllers\estadosportinbController::class, 'searchmisventasportainbound']);
    Route::get('searchmisventasportadigital', [App\Http\Controllers\estadosportdigiController::class, 'searchmisventasportadigital']);
    Route::get('searchmisventasportateleventas', [App\Http\Controllers\estadosportatelevController::class, 'searchmisventasportateleventas']);

    Route::get('searchmisventasupgradeinbo', [App\Http\Controllers\EstadoUpgradeInbound::class, 'searchmisventasupgradeinbo']);
    Route::get('searchmisventasupgradedigi', [App\Http\Controllers\EstadoUpgradeDigital::class, 'searchmisventasupgradedigi']);
    Route::get('searchmisventasupgratelev', [App\Http\Controllers\EstadoUpgradeTeleventa::class, 'searchmisventasupgratelev']);

    Route::get('searchmisventasprepostinbo', [App\Http\Controllers\EstadoPrepostInbound::class, 'searchmisventasprepostinbo']);
    Route::get('searchmisventasprepostdigi', [App\Http\Controllers\EstadoPrepostDigital::class, 'searchmisventasprepostdigi']);
    Route::get('searchmisventaspreposttelev', [App\Http\Controllers\EstadoPrepostTeleventa::class, 'searchmisventaspreposttelev']);

    Route::get('searchmisventasfijainbo', [App\Http\Controllers\EstadoFijaInbound::class, 'searchmisventasfijainbo']);
    Route::get('searchmisventasfijadigi', [App\Http\Controllers\EstadoFijaDigital::class, 'searchmisventasfijadigi']);
    Route::get('searchmisventasfijatelev', [App\Http\Controllers\EstadoFijaTeleventa::class, 'searchmisventasfijatelev']);

    /* Fin busqueda mis ventas*/

    /* alerts */
    Route::get('searchalerts', [App\Http\Controllers\inicioController::class, 'searchalerts']);
    /* FIN */

    /* INCIO INFORME */

    Route::resource('informe', App\Http\Controllers\InformeController::class);

    Route::get('/informe/import', [App\Http\Controllers\informeImportController::class, 'show']);
    Route::post('/informe/import', [App\Http\Controllers\informeImportController::class, 'store']);

    Route::get('/info14/import', [App\Http\Controllers\info14ImportController::class, 'show']);
    Route::post('/info14/import', [App\Http\Controllers\info14ImportController::class, 'store']);

    Route::get('/info24/import', [App\Http\Controllers\info24ImportController::class, 'show']);
    Route::post('/info24/import', [App\Http\Controllers\info24ImportController::class, 'store']);

    Route::get('/info34/import', [App\Http\Controllers\info34ImportController::class, 'show']);
    Route::post('/info34/import', [App\Http\Controllers\info34ImportController::class, 'store']);

    Route::get('/info44/import', [App\Http\Controllers\info44ImportController::class, 'show']);
    Route::post('/info44/import', [App\Http\Controllers\info44ImportController::class, 'store']);



    /* FIN INFORME */

    /* INICIO REDES SOCIALES */

    /* PORTABILIDAD */
    Route::resource('inicioredes', App\Http\Controllers\inicioredesController::class);
    Route::resource('portabilidadredes', App\Http\Controllers\portabilidadredesController::class);
    Route::resource('portabilidadredesventas', App\Http\Controllers\portabilidadredesventasController::class);
    Route::resource('portabilidadredesperdidas', App\Http\Controllers\portabilidadredesperdidaController::class);
    Route::get('searchportabilidadredes', [App\Http\Controllers\portabilidadredesController::class, 'searchportabilidadredes']);
    Route::get('portabilidadredes.excel', 'App\Http\Controllers\portabilidadredesController@exportExcel')->name('portabilidadredes.excel');

    /* MIGRACION */
    Route::resource('migracionredes', App\Http\Controllers\migracionredesController::class);
    Route::resource('migracionredesventas', App\Http\Controllers\migracionredesventasController::class);
    Route::resource('migracionredesperdidas', App\Http\Controllers\migracionredesperdidaController::class);
    Route::get('searchmigracionredes', [App\Http\Controllers\migracionredesController::class, 'searchmigracionredes']);
    Route::get('migracionredes.excel', 'App\Http\Controllers\migracionredesController@exportExcel')->name('migracionredes.excel');

    /* PREPOST */
    Route::resource('prepostredes', App\Http\Controllers\prepostredesController::class);
    Route::resource('prepostredesventas', App\Http\Controllers\prepostredesventasController::class);
    Route::resource('prepostredesperdidas', App\Http\Controllers\prepostredesperdidaController::class);
    Route::get('searchprepostredes', [App\Http\Controllers\prepostredesController::class, 'searchprepostredes']);
    Route::get('prepostredes.excel', 'App\Http\Controllers\prepostredesController@exportExcel')->name('prepostredes.excel');

    /*FIN REDES SOCIALES */

    Route::resource('subirbase', App\Http\Controllers\subirbaseController::class);


    Route::resource('iniciorne', App\Http\Controllers\IniciorneController::class);
    Route::resource('rne', App\Http\Controllers\RneController::class);


    /* INICIO MARKETING */

    Route::resource('marketing', App\Http\Controllers\MarketingController::class);

    Route::resource('markephoenix', App\Http\Controllers\MarketingPhoenixController::class);
    Route::resource('phoenixmarkperdida', App\Http\Controllers\MarketingPhoenixPerdidasController::class);

    /* buscador Phoenix */
    Route::get('searchmarkphoenixe', [App\Http\Controllers\MarketingPhoenixController::class, 'searchmarkphoenixe']);
    Route::get('searchphoenixperdida', [App\Http\Controllers\MarketingPhoenixController::class, 'searchphoenixperdida']);
    Route::get('searchmarkephoenixperdida', [App\Http\Controllers\MarketingPhoenixPerdidasController::class, 'searchmarkephoenixperdida']);

    Route::get('phoenix.excel', 'App\Http\Controllers\MarketingPhoenixController@exportExcel')->name('phoenix.excel');


    Route::resource('markefija', App\Http\Controllers\MarketingFijaController::class);
    Route::get('searchmarkefija', [App\Http\Controllers\MarketingFijaController::class, 'searchmarkefija']);
    Route::resource('markefijaperdida', App\Http\Controllers\MarketingFijaPerdidasController::class);
    Route::get('searchmarkfijaperdida', [App\Http\Controllers\MarketingFijaPerdidasController::class, 'searchmarkfijaperdida']);


    Route::resource('markeportabilidad', App\Http\Controllers\MarketingPortabilidadController::class);
    Route::get('searchmarkportabilidad', [App\Http\Controllers\MarketingPortabilidadController::class, 'searchmarkportabilidad']);
    Route::resource('markepreposperdida', App\Http\Controllers\MarketingPortabilidadPerdidasController::class);
    Route::get('searchmarkeportaperdida', [App\Http\Controllers\MarketingPortabilidadPerdidasController::class, 'searchmarkeportaperdida']);


    Route::resource('markeprepos', App\Http\Controllers\MarketingPreposController::class);
    Route::get('searchmarkeprepos', [App\Http\Controllers\MarketingPreposController::class, 'searchmarkeprepos']);
    Route::resource('markeportabilidadperdida', App\Http\Controllers\MarketingPreposPerdidasController::class);
    Route::get('searchmarkprepotperdida', [App\Http\Controllers\MarketingPreposPerdidasController::class, 'searchmarkprepotperdida']);


    Route::resource('markeupgrade', App\Http\Controllers\MarketingUpgradeController::class);
    Route::get('searchmarkupgrade', [App\Http\Controllers\MarketingUpgradeController::class, 'searchmarkupgrade']);

    /* INICIO MARKETING */


    /* INICIO LINEA RESCATE */

    Route::resource('linearescate', App\Http\Controllers\linearescateController::class);
    Route::get('/buscar-ultimo-registro/{lineaTitular}', [linearescateController::class, 'buscarUltimoRegistro']);

    Route::get('exportlinres.excel', 'App\Http\Controllers\linearescateController@exportlinresExcel')->name('exportlinres.excel');


    Route::controller(linearescateController::class)->group(function () {

        Route::get('/linearventas', 'indexventa');
    });

    Route::controller(phoenixController::class)->group(function () {

        Route::get('/ventaspho', 'misventaspho');
    });


    /* FIN LINEA RESCATE */

    Route::resource('markedigital', App\Http\Controllers\MarketingDigitalController::class);
});
