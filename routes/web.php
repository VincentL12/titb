<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Pages\TagController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\ReplyController;
use App\Http\Controllers\Pages\FollowController;
use App\Http\Controllers\Pages\ThreadController;
use App\Http\Controllers\Pages\ProfileController;
use App\Http\Controllers\Dashboard\NotificationController;

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

require 'admin.php';

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'threads', 'as' => 'threads.'], function () {
    /* Name: Threads
     * Url: /threads/*
     * Route: threads.*
     */
    Route::get('/', [ThreadController::class, 'index'])->name('index');
    Route::get('create', [ThreadController::class, 'create'])->name('create');
    Route::post('/', [ThreadController::class, 'store'])->name('store');
    Route::get('/{thread:slug}/edit', [ThreadController::class, 'edit'])->name('edit');
    Route::post('/{thread:slug}', [ThreadController::class, 'update'])->name('update');
    Route::get('/{category:slug}/{thread:slug}', [ThreadController::class, 'show'])->name('show');
    Route::get('/{category:slug}', [ThreadController::class, 'sortByCategory'])->name('sort');
});

Route::get('/search', [ThreadController::class, 'search'])->name('search');

Route::get('/popular/weeks', [ThreadController::class, 'thisWeek'])->name('weeks');
Route::get('/popular/all', [ThreadController::class, 'allTime'])->name('all');
Route::get('/no-replies', [ThreadController::class, 'zeroComment'])->name('no-replies');

Route::group(['prefix' => 'replies', 'as' => 'replies.'], function () {
    /* Name: Replies
     * Url: /replies/*
     * Route: replies.*
     */
    Route::post('/', [ReplyController::class, 'store'])->name('store');
    Route::get('reply/{id}/{type}', [ReplyController::class, 'redirect'])->name('replyAble');
});

// Profile
Route::get('profile/user/{user:username}', [ProfileController::class, 'show'])->name('profile');

// Follows
Route::post('profile/user/{user:username}/follow', [FollowController::class, 'store'])->name('follow');


