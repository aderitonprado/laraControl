<?php

use App\Http\Livewire\Supply\SupplyCreate;
use App\Http\Livewire\Supply\SupplyEdit;
use App\Http\Livewire\Supply\SupplyList;
use App\Http\Livewire\Supply\SupplyReports;
use App\Http\Livewire\Supply\SupplyShow;

/** Componente Groups */
use App\Http\Livewire\Group\GroupCreate;
use App\Http\Livewire\Group\GroupEdit;
use App\Http\Livewire\Group\GroupList;
use App\Http\Livewire\Group\GroupShow;

/** Compomente Equipaments */


use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
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

    });

    Route::prefix('groups')->name('groups.')->group(function(){
        
        Route::get('/', GroupList::class)->name('index');
        Route::get('/show/{group}', GroupShow::class)->name('show');
        Route::get('/create', GroupCreate::class)->name('create');
        Route::get('/edit/{group}', GroupEdit::class)->name('edit');

    });

    Route::prefix('equipaments')->name('equipaments.')->group(function(){
        
        Route::get('/', SupplyList::class)->name('index');
        Route::get('/show/{supply}', SupplyShow::class)->name('show');
        Route::get('/create', SupplyCreate::class)->name('create');
        Route::get('/edit/{supply}', SupplyEdit::class)->name('edit');

    });
});
