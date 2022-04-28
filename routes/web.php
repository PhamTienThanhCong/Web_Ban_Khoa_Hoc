<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\authAdminController;
use App\Http\Controllers\CourseSellerController;
use App\Http\Controllers\SellerController;
use App\Http\Middleware\AdminWasLogin;
use App\Http\Middleware\SellerWasLogin;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin', function () {
    return view('auth.loginAdmin');
})->name('admin.login');

Route::get('/admin/register', function () {
    return view('auth.registerAdmin');
})->name('admin.register');

// account processing
Route::post('/admin/register_processing', [authAdminController::class, 'register'])->name('admin.processing.register');
Route::post('/admin/login_processing', [authAdminController::class, 'login'])->name('admin.processing.login');
Route::get('/account/logout', [authAdminController::class, 'logout'])->name('admin.logout');


Route::group([
    'middleware' => AdminWasLogin::class,
],function(){
    Route::get('/admin/tongquan', [AdminController::class, 'overview'])->name('admin.overview');
    
    Route::get('/admin/quanlykhoahoc', [AdminController::class, 'mamagerCourses'])->name('admin.managerCourse');

    Route::get('/admin/quanlynhanvien', [AdminController::class, 'managerSeller'])->name('admin.managerSeller');
    
    Route::get('/admin/quanlynguoidung', [AdminController::class, 'managerUser'])->name('admin.managerUser');
});

Route::group([
    'middleware' => SellerWasLogin::class,
],function(){
    Route::get('/seller/tongquan', [SellerController::class, 'overview'])->name('seller.overview');
    
    Route::get('/seller/taokhoahoc', [SellerController::class, 'createCourse'])->name('seller.addCourse');
    
    Route::get('/seller/quanlykhoahoc', [SellerController::class, 'manageCourse'])->name('seller.managerCourse');
    
    Route::get('/seller/quanlykhoahoc/chitiet/{course}', [SellerController::class, 'detailCourse'])->name('seller.detailCourse');
    
    Route::get('/seller/quanlykhoahoc/chitiet/{course}/createLesson',[SellerController::class, 'createLesson'])->name('seller.createLesson');
    
    Route::get('/seller/quanlykhoahoc/chitiet/{course}/CauHoi{lesson}', [SellerController::class, 'createQuestion'])->name('seller.addQuestion');
    
    Route::get('/seller/quanlykhoahoc/chitiet/{course}/QuanLyCauhoi{lesson}', [SellerController::class, 'manageQuestion'])->name('seller.questionManagement');

    Route::get('/seller/taikhoancuatoi', [authAdminController::class, 'myAccount'])->name('seller.myAccount');

    Route::post('seller/taokhoahoc/xuly', [SellerController::class, 'createCourseProcessing'])->name('seller.addCourseProcessing');
});
