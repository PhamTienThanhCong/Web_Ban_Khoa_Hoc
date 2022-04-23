<?php

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
    return view('content.loginAdmin');
})->name('admin.login');

Route::get('/admin/register', function () {
    return view('content.registerAdmin');
})->name('admin.register');

Route::get('/admin/tongquan', function () {
    return view('content.admin.overView');
})->name('admin.overview');

Route::get('/admin/quanlykhoahoc', function () {
    return view('content.admin.managerCourse');
})->name('admin.managerCourse');

Route::get('/admin/quanlynhanvien', function () {
    return view('content.admin.managerSeller');
})->name('admin.managerSeller');

Route::get('/admin/quanlynguoidung', function () {
    return view('content.admin.managerUser');
})->name('admin.managerUser');

Route::get('/seller/tongquan', function () {
    return view('content.seller.overView');
})->name('seller.overView');

Route::get('/seller/taikhoancuatoi', function () {
    return view('content.seller.myAccount');
})->name('seller.myAccount');

Route::get('/seller/taokhoahoc', function () {
    return view('content.seller.Course.addCourse');
})->name('seller.addCourse');

Route::get('/seller/quanlykhoahoc', function () {
    return view('content.seller.Course.managerCourse');
})->name('seller.managerCourse');

Route::get('/seller/quanlykhoahoc/chitiet/{course}', function ($course) {
    return view('content.seller.Course.detailCourse', [
        'course' => $course,
    ]);
})->name('seller.detailCourse');

Route::get('/seller/quanlykhoahoc/chitiet/{course}/createLesson', function ($course) {
    return view('content.seller.Course.addLesson', [
        'course' => $course,
    ]);
})->name('seller.createLesson');

Route::get('/seller/quanlykhoahoc/chitiet/{course}/CauHoi{lesson}', function ($course,$lesson) {
    return view('content.seller.Course.addQuestion', [
        'course' => $course,
    ]);
})->name('seller.addQuestion');

Route::get('/seller/quanlykhoahoc/chitiet/{course}/QuanLyCauhoi{lesson}', function ($course,$lesson) {
    return view('content.seller.Course.questionManagement', [
        'course' => $course,
    ]);
})->name('seller.questionManagement');

Route::get('/', function () {
    return view('welcome');
});
