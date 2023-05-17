<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();
Route::post('/upload-file', [App\Http\Controllers\DocumentController::class, 'uploadFile'])->name('file.upload');
Route::get('', [App\Http\Controllers\DocumentController::class, 'index']);
Route::get('/dispatch-document-queue', [App\Http\Controllers\DocumentController::class, 'dispatchDocumentQueue'])->name('process.documents');;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
