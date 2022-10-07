<?php

use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Main\MainController;
use Illuminate\Support\Facades\Route;




Route::get('/', MainController::class)->name('main.index');


Route::prefix('articles')->name('articles.')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('index');
    Route::get('/{id}', [ArticleController::class, 'getArticle'])->name('getArticle');
});
