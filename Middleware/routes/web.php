<?php

use Illuminate\Support\Facades\Route;
//GET CONTROLLERS NIKE_VERO
use App\Http\Controllers\{CompanyController, CustomerController, ProfileController, UserController, ConectorsController,ModulesController,HomeController,ImportController,ProcessorController, CrudController};

//ROTA INICIAL
//ROTA INICIAL




Route::get('/', function () {

    return redirect()->route('login');
});

Route::any('/test', [HomeController::class, 'test']);
Route::get('info', function () {return phpinfo();});
// Route::get('/', function () {

//     return redirect()->route('register');
// });
//ROTA INICIAL
//ROTA INICIAL


Auth::routes();
Route::group(['middleware' => ['auth']], function () {
//HOME PAGE NIKE VERO
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
//HOME PAGE NIKE VERO



//CONECTORES
Route::resource('conectors',  ConectorsController::class)->middleware('auth');

/////////////////////
//COMPANIES PAGE NIKE VERO
Route::resource('companies',  CompanyController::class)->middleware('auth');
Route::prefix('company')->middleware('auth')->name('company.')->group(function() {
//COMPANIES PAGE NIKE VERO

	Route::any('configuration', [ModulesController::class, 'index'])->name('configuration');
	Route::any('select/{id}', [ModulesController::class, 'company_select'])->name('select');
	Route::any('connectors/{module}', [ModulesController::class, 'connector_select'])->name('connector');
	Route::any('connectors/{module}/null', [ModulesController::class, 'connector_config_null'])->name('connector.config_null');
	Route::any('connectors/{module}/{submodule}', [ModulesController::class, 'connector_config'])->name('connector.config');
	Route::any('processors/{module}', [ModulesController::class , 'processor_select'])->name('processor');
	Route::any('processors/{module}/{keyEdit}/destroy', [ModulesController::class, 'processor_destroy'])->name('processor.destroy');
	Route::any('processors/{module}/{submodule}/{index?}', [ModulesController::class, 'processor_config'])->name('processor.config');

	Route::any('import/{module}', [ModulesController::class, 'import'])->name('import');
	Route::any('export/{module}', [ModulesController::class, 'export'])->name('export');
	Route::any('export/{module}/logs/import', [ModulesController::class, 'logs_import'])->name('logs.import');
	Route::any('export/{module}/logs/import/{log}/purge', [ModulesController::class, 'logs_import_purge'])->name('logs.import.purge');
	Route::any('export/{module}/logs/export', [ModulesController::class, 'logs_export'])->name('logs.export');
	Route::any('export/{module}/logs/export/{log}/purge', [ModulesController::class, 'logs_export_purge'])->name('logs.export.purge');
	Route::any('export/{module}/generate/', [ModulesController::class, 'export_generate'])->name('export.generate');
	Route::any('export/download/{file}', [ModulesController::class, 'export_download'])->name('export.download');

});

Route::prefix('/crud')->name('crud.')->group(function () {

	Route::get('{module}/list', [CrudController::class, 'list'])->name('list');
	Route::any('{module}/create', [CrudController::class, 'create'])->name('create');
	Route::any('{module}/edit/{id}', [CrudController::class, 'update'])->name('edit');
	Route::post('{module}/destroy/{id}', [CrudController::class, 'destroy'])->name('destroy');

});



////////////////ROUTES TETE CSV DATA //////////////////////////////////////////////////
////////////////ROUTES TETE CSV DATA //////////////////////////////////////////////////
///////////FUNÇÃO IMPORT E FUNÇÃO TRATAMENTO //////////////////////////////////////////
Route::any('/clientes_importe', [\App\Http\Controllers\ImportCompanyDataController::class, 'index'])->name('import.cliente');
Route::post('/import_CSV', [\App\Http\Controllers\ModulesController::class, 'CSVImport'])->name('import_CSV');
Route::post('/import_process', [\App\Http\Controllers\ModulesController::class, 'CSVprocessImport'])->name('import_process');
Route::any('/importado_com_sucesso', [\App\Http\Controllers\ImportCompanyDataController::class, 'sucess'])->name('import.sucesso');

///////////FUNÇÃO IMPORT E FUNÇÃO TRATAMENTO //////////////////////////////////////////
Route::get('/clientes_importe', [\App\Http\Controllers\ImportCompanyDataController::class, 'index'])->name('import.cliente');
Route::post('/import_CSV', [\App\Http\Controllers\ImportController::class, 'CSVImport'])->name('import_CSV');
Route::post('/import_process', [\App\Http\Controllers\ImportController::class, 'CSVprocessImport'])->name('import_process');
///////////FUNÇÃO IMPORT E FUNÇÃO TRATAMENTO //////////////////////////////////////////
////////////////////////////////////////// ROTA TESTE XML //////////////////////////////////////////
Route::match(["get", "post"], "import_clientes_xml", [ImportCompanyDataController::class, "xml_data_import_"])->name('xml-upload');
////////////////////////////////////////// ROTA TESTE XML //////////////////////////////////////////

//PERFIS AND USERS PAGE NIKE VERO
//PERFIS AND USERS PAGE NIKE VERO
Route::resource('users',  UserController::class)->middleware('auth');
Route::get('/showme', [UserController::class, 'showme'])->name('users.showme')->middleware('auth');

//Customers
Route::get('/companies/{id}/customers', [CustomerController::class, 'index'])->name('company.customer.index')->middleware('auth');
Route::get('/companies/{id}/customers/create', [CustomerController::class, 'create'])->name('company.customer.create')->middleware('auth');
Route::post('/companies/{id}/customers/store', [CustomerController::class, 'store'])->name('company.customer.store')->middleware('auth');
Route::get('/companies/customers/edit/{customer_id}', [CustomerController::class, 'edit'])->name('company.customer.edit')->middleware('auth');
Route::put('/companies/customers/update/{customer_id}', [CustomerController::class, 'update'])->name('company.customer.update')->middleware('auth');
Route::get('/companies/customers/show/{customer_id}', [CustomerController::class, 'show'])->name('company.customer.show')->middleware('auth');
Route::post('/companies/customers/destroy/{customer_id}', [CustomerController::class, 'destroy'])->name('company.customer.destroy')->middleware('auth');
//PERFIS AND USERS PAGE NIKE VERO
//PERFIS AND USERS PAGE NIKE VERO

});


Route::get('export', function () {
	return (new \App\Services\Export\Faturamento(\App\Models\Company::find(31)))->download();
});

Route::get('saidaExport', function () {
	return (new \App\Services\Export\SaidaMercadoria)->download();
});

Route::get('entradaExport', function () {
	return (new \App\Services\Export\EntradaMercadoria)->download();
});

Route::get('entregaExport', function () {
	return (new \App\Services\Export\Entrega)->download();
});

Route::get('devolucaoExport', function () {
	return (new \App\Services\Export\Devolucao)->download();
});
