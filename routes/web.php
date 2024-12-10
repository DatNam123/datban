<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\TableController as AdminTableController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\PostController as FrontendPostController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class, 'index'])->name('index');
Route::get('/about', [WelcomeController::class, 'about'])->name('about');
Route::get('/contact', [WelcomeController::class, 'contact'])->name('contact');
Route::post('/contact', [WelcomeController::class, 'storeContact'])->name('contact.store');
Route::get('/posts', [FrontendPostController::class, 'index'])->name('post.index');
Route::get('/posts/{post}', [FrontendPostController::class, 'show'])->name('post.show');

Route::get('/menus/search', [FrontendMenuController::class, 'search'])->name('menus.search');
Route::get('/menus', [FrontendMenuController::class, 'index'])->name('menus.index');
Route::get('/menus/{menu}', [FrontendMenuController::class, 'show'])->name('menus.show');
Route::get('/reservation', [FrontendReservationController::class, 'create'])->name('reservation');

Route::middleware('user')->group(function () {

    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::post('/reservation', [FrontendReservationController::class, 'store'])->name('reservation.store');
    Route::get('/reservation/show', [FrontendReservationController::class, 'show'])->name('reservation.show');
    Route::delete('/reservation/{reservation}', [FrontendReservationController::class, 'delete'])->name('reservation.delete');
});




Route::middleware(['admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/categories', CategoryController::class);
    Route::get('/menus/search', [MenuController::class, 'search'])->name('menus.search');
    Route::resource('/menus', MenuController::class);
    Route::resource('/slides', SlideController::class);
    Route::resource('/posts', PostController::class);
    Route::resource('/teams', TeamController::class);
    Route::resource('/contact', AdminContactController::class);
    Route::put('/reservation/{reservation}/update-status', [ReservationController::class, 'updateStatus'])->name('reservation.updateStatus');
    Route::resource('/reservation', ReservationController::class);
    Route::resource('/tables', AdminTableController::class);
    Route::get('/customers', [UserController::class, 'index'])->name('customers.index');
    Route::delete('/customers/{user}', [UserController::class, 'destroy'])->name('customers.destroy');


    Route::get('/reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
    Route::patch('/reviews/{review}/approve', [AdminReviewController::class, 'approve'])->name('reviews.approve');
    Route::patch('/reviews/{review}/notApprove', [AdminReviewController::class, 'notApprove'])->name('reviews.notApprove');


    // Route::get('ckeditor', [CkeditorController::class, 'index']);
    Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');
});



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
