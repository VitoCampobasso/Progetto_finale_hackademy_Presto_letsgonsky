<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

//Rotta della homepage
Route::get('/',[PublicController::class, 'welcome'])->name('welcome');

//Rotte dell'articolo
Route::get('/article/create',[ArticleController::class, 'create'])->name('article.create')->middleware('auth');
Route::get('/article/index',[ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}',[ArticleController::class,'show'])->name('article.show');
Route::get('/category/{category}',[ArticleController::class,'byCategory'])->name('article.byCategory');

// Rotte del RevisorController
Route::get('/revisor/index', [RevisorController::class, 'index'])->name('revisor.index')->middleware('is_revisor');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('revisor.accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('revisor.reject');
Route::patch('/undo/{article}', [RevisorController::class, 'undo'])->name('revisor.undo');
Route::get('/revisor/form', [RevisorController::class, 'formRevisor'])->name('revisor.form')->middleware('auth');
Route::post('/revisor/submit', [RevisorController::class, 'submit'])->name('revisor.submit');

// Rotte della mail
Route::post('/revisor/request', [RevisorController::class, 'becomeRevisor'])->name('become.revisor')->middleware('auth');
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

//rotta button search
Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('article.search');
//rotta lingua
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');