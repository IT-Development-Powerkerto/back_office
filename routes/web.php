<?php

use App\Http\Controllers\AdminCategoryController;
use Illuminate\Support\Facades\Auth;
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
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ProductController;
use App\Events\MessageCreated;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SuperAdminController;

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
})->name('welcome')->middleware('guest');

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

Route::resource('/superadmin', SuperAdminController::class)->middleware('auth');
Route::post('/update/aktive/{user}', [SuperAdminController::class, 'updateAktive'])->name('updateAktive');
Route::post('/update/nonaktive/{user}', [SuperAdminController::class, 'updateNonAktive'])->name('updateNonAktive');

Route::get('/dashboard/blog/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/blog', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::resource('users', UserController::class);
Route::get('/viewprofile/{user}', [UserController::class, 'viewProfile'])->name('viewProfile');
Route::get('/status/update', [UserController::class, 'updateStatus'])->name('users.update.status');
//Route::resource('/dasboard', DashboardController::class);
Route::resource('/dashboard', DashboardController::class)->middleware('auth');
Route::get('/ld', [DashboardController::class, 'ld'])->name('dashboard.ld');
Route::get('/adv', [DashboardController::class, 'adv'])->name('advDashboard')->middleware('auth');
Route::get('/cs', [DashboardController::class, 'cs'])->name('csDashboard')->middleware('auth');
//Route::get('/dashboard',[UserController::class, 'index'])->middleware('auth');
Route::get('/myprofile',[UserController::class, 'index'])->middleware('auth');
Route::patch('/myprofile',[UserController::class, 'changePassword'])->name('changePassword')->middleware('auth');

Route::resource('announcements', AnnouncementController::class);

Route::resource('roles', RoleController::class);

Route::resource('statuses', StatusController::class);

Route::resource('product', ProductController::class)->middleware('auth');
Route::resource('lead', LeadController::class)->middleware('auth');

Route::resource('campaign', CampaignController::class)->middleware('auth');
Route::get('campaign/{campaign}', [CampaignController::class, 'addOperator'])->name('addOperator')->middleware('auth');
Route::post('campaign/{campaign}', [OperatorController::class, 'store'])->name('addOperator.store')->middleware('auth');
Route::delete('campaign/{campaign}/{operator}', [OperatorController::class, 'destroy'])->name('addOperator.destroy')->middleware('auth');

//Route::post("/campaign", [CampaignController::class, 'addMorePost']);

Route::resource('operator', OperatorController::class)->middleware('auth');

Route::get('dashboard/export-csv', [TaskController::class, 'export_csv'])->name('export-csv');
Route::get('getRole/{id}', function ($id) {
    $roles = App\Models\User::where('role_id',$id)->get();
    return response()->json($roles);
});
Route::get('leads/export', [LeadController::class, 'export'])->name('export-lead');
Route::get('send/{email}/{number}/{text}/{thanks}/{product}/{client}/{client_number}/{FU_text}/{operator}', [MailController::class, 'index'])->name('send');
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



