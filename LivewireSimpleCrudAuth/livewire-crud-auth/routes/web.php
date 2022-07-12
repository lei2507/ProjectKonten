<?php

use App\Http\Livewire\Product\Create as ProductCreate;
use App\Http\Livewire\Product\Edit as ProductEdit;
use App\Http\Livewire\Product\Index as ProductIndex;
use App\Http\Livewire\Product\Detail as ProductDetail;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Logout;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function() {
    Route::get('/', ProductIndex::class)->name('product.index');
    Route::get('/detail/{id}', ProductDetail::class)->name('product.detail');
    Route::get('/create', ProductCreate::class)->name('product.create');
    Route::get('/edit/{id}', ProductEdit::class)->name('product.edit');

    Route::get('/logout', Logout::class)->name('logout');
});

Route::middleware('guest')->group(function() {
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');
});
