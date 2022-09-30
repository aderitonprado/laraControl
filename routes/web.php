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
use App\Http\Livewire\Equipament\EquipamentCreate;
use App\Http\Livewire\Equipament\EquipamentList;
use App\Http\Livewire\Equipament\EquipamentEdit;
use App\Http\Livewire\Equipament\EquipamentShow;

/** Compomente Requisitions */
use App\Http\Livewire\Requisition\RequisitionCreate;
use App\Http\Livewire\Requisition\RequisitionList;
use App\Http\Livewire\Requisition\RequisitionEdit;
use App\Http\Livewire\Requisition\RequisitionShow;

/** Compomente ThirdyParts */
use App\Http\Livewire\ThirdParty\ThirdPartyCreate;
use App\Http\Livewire\ThirdParty\ThirdPartyList;
use App\Http\Livewire\ThirdParty\ThirdPartyEdit;
use App\Http\Livewire\ThirdParty\ThirdPartyShow; 

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

    Route::prefix('thirdparties')->name('thirdparties.')->group(function () {

        Route::get('/', ThirdPartyList::class)->name('index');
        Route::get('/show/{thirdparty}', ThirdPartyShow::class)->name('show');
        Route::get('/create', ThirdPartyCreate::class)->name('create');
        Route::get('/edit/{thirdparty}', ThirdPartyEdit::class)->name('edit');

    });

    Route::prefix('groups')->name('groups.')->group(function(){
        
        Route::get('/', GroupList::class)->name('index');
        Route::get('/show/{group}', GroupShow::class)->name('show');
        Route::get('/create', GroupCreate::class)->name('create');
        Route::get('/edit/{group}', GroupEdit::class)->name('edit');

    });

    Route::prefix('equipaments')->name('equipaments.')->group(function(){
        
        Route::get('/', EquipamentList::class)->name('index');
        Route::get('/show/{equipament}', EquipamentShow::class)->name('show');
        Route::get('/create', EquipamentCreate::class)->name('create');
        Route::get('/edit/{equipament}', EquipamentEdit::class)->name('edit');

    });

    Route::prefix('requisitions')->name('requisitions.')->group(function(){
        
        Route::get('/', RequisitionList::class)->name('index');
        Route::get('/create', RequisitionCreate::class)->name('create');
        Route::get('/edit/{requisition}', RequisitionEdit::class)->name('edit');
        Route::get('/show/{requisition}', RequisitionShow::class)->name('show');

    });
});
