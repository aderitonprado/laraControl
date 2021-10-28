<?php

use App\Http\Livewire\Supply\SupplyCreate;
use App\Http\Livewire\Supply\SupplyEdit;
use App\Http\Livewire\Supply\SupplyList;
use App\Http\Livewire\Supply\SupplyPdf;
use App\Http\Livewire\Supply\SupplyReports;
use App\Http\Livewire\Supply\SupplyShow;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::prefix('supplies')->name('supplies.')->group(function () {

        Route::get('/', SupplyList::class)->name('index');
        Route::get('/show/{supply}', SupplyShow::class)->name('show');
        Route::get('/create', SupplyCreate::class)->name('create');
        Route::get('/edit/{supply}', SupplyEdit::class)->name('edit');

        Route::get('/reports', SupplyReports::class)->name('reports');
        Route::get('/pdf', [SupplyPdf::class, 'createPDF'])->name('pdf');
    });
});
