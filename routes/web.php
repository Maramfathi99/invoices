<?php

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
    return view('auth.login');
});

Auth::routes();
//Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('invoices',\App\Http\Controllers\InvoicesController::class);
Route::resource('sections',\App\Http\Controllers\SectionsController::class);
Route::resource('products',\App\Http\Controllers\ProductsController::class);
Route::resource('InvoiceAttachments', \App\Http\Controllers\InvoiceAttachmentsController::class);
Route::resource('InvoiceArchive', \App\Http\Controllers\InvoiceArchiveController::class);

Route::get('/section/{id}',[\App\Http\Controllers\InvoicesController::class ,'getproducts']);
Route::get('/InvoicesDetails/{id}',[\App\Http\Controllers\InvoicesDetailsController::class ,'edit']);
Route::get('download/{invoice_number}/{file_name}',  [\App\Http\Controllers\InvoicesDetailsController::class ,'get_file']);
Route::get('View_file/{invoice_number}/{file_name}',  [\App\Http\Controllers\InvoicesDetailsController::class ,'open_file']);
Route::post('delete_file', [\App\Http\Controllers\InvoicesDetailsController::class ,'destroy'])->name('delete_file');
Route::get('/Status_show/{id}', [\App\Http\Controllers\InvoicesController::class,'show'])->name('Status_show');
Route::post('/Status_Update/{id}', [\App\Http\Controllers\InvoicesController::class,'status_update'])->name('Status_Update');
Route::get('/edit_invoice/{id}',  [\App\Http\Controllers\InvoicesController::class,'edit']);
Route::get('/Invoice_Paid',  [\App\Http\Controllers\InvoicesController::class,'Invoice_Paid']);
Route::get('/Invoice_UnPaid',  [\App\Http\Controllers\InvoicesController::class,'Invoice_UnPaid']);
Route::get('/Invoice_Partial',  [\App\Http\Controllers\InvoicesController::class,'Invoice_Partial']);
Route::get('Print_invoice/{id}', [\App\Http\Controllers\InvoicesController::class,'Print_invoice']);

Route::get('/{page}', [\App\Http\Controllers\AdminController::class, 'index']);
