<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ajaxcrud\AjaxPostController;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AjaxPostController::class, 'index']);
Route::post('ajax-posts/store', [AjaxPostController::class, 'store'])->name('ajax-posts/store');
Route::post('ajax-posts/{id}', [AjaxPostController::class, 'edit'])->name('ajax-posts.edit');
Route::put('ajax-postsupdate/{id}', [AjaxPostController::class, 'update'])->name('ajax-posts.update');
Route::delete('ajax-posts/{id}', [AjaxPostController::class, 'destroy'])->name('ajax-posts.destroy');




// Route::post('/ajax-posts/store', 'AjaxPostController@store')->name('ajax-posts/store');
