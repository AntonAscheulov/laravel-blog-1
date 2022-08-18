<?php

use App\Http\Controllers\Admin\ExhibitionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use App\Notifications\SingUpNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ArtistController;
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
Auth::routes(['verify' => true]);
Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/post/{slug}', [HomeController::class, 'show'])->name('post.show');
Route::get('/tag/{slug}', [HomeController::class, 'tag'])->name('tag.show');
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category.show');
Route::get('/artist/{id}', [HomeController::class, 'artistSingle'])->name('artistSingle');
Route::get('/exhibition/{id}', [HomeController::class, 'exhibitionSingle'])->name('exhibitionSingle');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/artists', [HomeController::class, 'artists'])->name('artists');
Route::get('/exhibitions', [HomeController::class, 'exhibitions'])->name('exhibitions');
Route::get('/portfolios', [HomeController::class, 'portfolios'])->name('portfolios');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::group(['middleware' => 'guest'], function (){
    Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'auth'], function (){
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile',[ProfileController::class, 'index'])->name('profile');
    Route::put('/profile',[ProfileController::class, 'update'])->name('profileUpdate');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource("categories", CategoryController::class)->parameters([
        'categories' => "category:slug"
    ])->names([
        'edit' => 'admin.categories.edit',
        'create' => 'admin.categories.create',
        'show' => 'admin.categories.show',
        'index' => 'admin.categories.index',
        'store' => 'admin.categories.store',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.delete'
    ]);

    Route::resource("tags", TagController::class)->parameters([
        'tags' => "tag:slug"
    ])->names([
        'edit' => 'admin.tags.edit',
        'create' => 'admin.tags.create',
        'show' => 'admin.tags.show',
        'index' => 'admin.tags.index',
        'store' => 'admin.tags.store',
        'update' => 'admin.tags.update',
        'destroy' => 'admin.tags.delete'
    ]);

    Route::resource("users", UserController::class)->names([
        'edit' => 'admin.users.edit',
        'create' => 'admin.users.create',
        'show' => 'admin.users.show',
        'index' => 'admin.users.index',
        'store' => 'admin.users.store',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.delete'
    ]);

    Route::resource("posts", PostController::class)->names([
        'edit' => 'admin.posts.edit',
        'create' => 'admin.posts.create',
        'show' => 'admin.posts.show',
        'index' => 'admin.posts.index',
        'store' => 'admin.posts.store',
        'update' => 'admin.posts.update',
        'destroy' => 'admin.posts.delete'
    ]);

    Route::resource("exhibitions", ExhibitionController::class)->names([
        'edit' => 'admin.exhibitions.edit',
        'create' => 'admin.exhibitions.create',
        'show' => 'admin.exhibitions.show',
        'index' => 'admin.exhibitions.index',
        'store' => 'admin.exhibitions.store',
        'update' => 'admin.exhibitions.update',
        'destroy' => 'admin.exhibitions.delete'
    ]);

    Route::resource("artists", ArtistController::class)->names([
        'edit' => 'admin.artists.edit',
        'create' => 'admin.artists.create',
        'show' => 'admin.artists.show',
        'index' => 'admin.artists.index',
        'store' => 'admin.artists.store',
        'update' => 'admin.artists.update',
        'destroy' => 'admin.artists.delete'
    ]);
});
