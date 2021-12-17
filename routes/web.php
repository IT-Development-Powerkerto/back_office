<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\DashboardController;

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
})->name('welcome');

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        // "active" => "about",
        "name" => "Rezdian Yursandi",
        "email" => "rezdiany@gmail.com",
        "image" => "image.jpg"

    ]);
});
Route::get('/blog', [PostController::class, 'index'])->name('blog');
Route::get('/post/{post:slug}', [PostController::class, 'show']);
Route::get('/categories',[CategoryController::class,'index']);

Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);

Route::post('/logout',[LoginController::class, 'logout']);


Route::get('/register',[RegisterController::class, 'create'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

//Route::get('/dashboard', function () { return view('dashboard'); })->middleware('auth');

Route::get('/dashboard/blog/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/blog', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::resource('users', UserController::class);
//Route::resource('/dasboard', DashboardController::class);
Route::resource('/dashboard', DashboardController::class)->middleware('auth');
Route::delete('/dashboard/{user}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');
//Route::get('/dashboard',[UserController::class, 'index'])->middleware('auth');

Route::resource('announcements', AnnouncementController::class);

Route::resource('roles', RoleController::class);

Route::resource('statuses', StatusController::class);

Route::get('getRole/{id}', function ($id) {
    $roles = App\Models\User::where('role_id',$id)->get();
    return response()->json($roles);
});

// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('blog', [
//         'title' => "Post By Category : $category->name",
//         'active' => 'categories',
//         'post' => $category->post->load('category','author'),
//     ]);
// });
// Route::get('authors/{author:username}', function (User $author) {
//     return view('blog', [
//         'title' => "Post By Author : $author->name",
//         'post' => $author->post->load('category','author'),
//     ]);

// });



