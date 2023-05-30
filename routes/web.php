<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\authAdminController;
use App\Http\Controllers\homeViewController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\userController;
use App\Http\Middleware\AdminDontLogin;
use App\Http\Middleware\AdminWasLogin;
use App\Http\Middleware\UserWasLogin;
use App\Http\Middleware\SellerWasLogin;
use App\Http\Middleware\AdminSellerWasLogin;
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

// admin and seller
Route::group([
    'middleware' => AdminDontLogin::class,
], function () {
    Route::get('/admin', function () {
        return view('auth.loginAdmin');
    })->name('admin.login');
    
    Route::get('/admin/register', function () {
        return view('auth.registerAdmin');
    })->name('admin.register');

    Route::post('/admin/register_processing', [authAdminController::class, 'register'])->name('admin.processing.register');
});

Route::get('/account/logout', [authAdminController::class, 'logout'])->name('admin.logout');  
Route::post('/admin/login_processing', [authAdminController::class, 'login'])->name('admin.processing.login');

Route::group([
    'middleware' => AdminWasLogin::class,
],function(){
    Route::get('/admin/tongquan', [AdminController::class, 'overview'])->name('admin.overview');
    
    Route::get('/admin/quan-ly-khoa-hoc/{name_admin?}', [AdminController::class, 'mamagerCourses'])->name('admin.managerCourse');
    Route::get('/admin/quan-ly-khoa-hoc/{name_admin}/Khoa-hoc{course}', [AdminController::class, 'mamagerDetailCourses'])->name('admin.mamagerDetailCourses');
    Route::get('/admin/quan-ly-khoa-hoc/{name_admin}/Khoa-hoc{course}/xac-nhan{type}', [AdminController::class, 'acceptCourse'])->name('admin.acceptCourse');
    Route::get('/admin/quan-ly-khoa-hoc/{name_admin}/Khoa-hoc{course}/Bai-Hoc{lesson}', [AdminController::class, 'viewLesson'])->name('admin.viewLesson');

    Route::get('/admin/quan-ly-nhan-vien', [AdminController::class, 'managerSeller'])->name('admin.managerSeller');
    Route::get('/admin/quan-ly-nhan-vien/xem-nhan-vien{seller}', [AdminController::class, 'viewSeller'])->name('admin.viewSeller');
    Route::get('/admin/quan-ly-nhan-vien/xem-nhan-vien{seller}/cap-nhap{type}/token={token}' , [AdminController::class, 'updateSeller'])->name('admin.SellerUpdate');

    Route::get('/admin/quan-ly-nguoi-dung', [AdminController::class, 'managerUser'])->name('admin.managerUser');

});

Route::group([
    'middleware' => AdminSellerWasLogin::class,
],function(){
    Route::get('/account/tai-khoan-cua-toi', [authAdminController::class, 'myAccount'])->name('admin.myAccount');
    Route::put('/account/tai-khoan-cua-toi/thay-doi', [authAdminController::class, 'updateMyAccount'])->name('admin.myAccountUpdate');
    Route::put('/account/tai-khoan-cua-toi/thay-doi-mat-khau', [authAdminController::class, 'updateMyPassword'])->name('admin.myAccountUpdatePassword');

});

Route::group([
    'middleware' => SellerWasLogin::class,
],function(){
    Route::get('/seller/tong-quan', [SellerController::class, 'overview'])->name('seller.overview');
    
    Route::get('/seller/tao-khoa-hoc', [SellerController::class, 'createCourse'])->name('seller.addCourse');
    Route::post('seller/tao-khoa-hoc/xu-ly', [SellerController::class, 'createCourseProcessing'])->name('seller.addCourseProcessing');
    
    Route::get('/seller/quan-ly-khoa-hoc', [SellerController::class, 'manageCourse'])->name('seller.managerCourse');
    
    Route::get('/seller/quan-ly-khoa-hoc/chi-tiet-id-{course}', [SellerController::class, 'detailCourse'])->name('seller.detailCourse');
    
    Route::get('/seller/quan-ly-khoa-hoc/chi-tiet-id-{course}/create-Lesson',[SellerController::class, 'createLesson'])->name('seller.createLesson');
    Route::post('/seller/quan-ly-khoa-hoc/chi-tiet-id-{course}/create-Lesson/xuly', [SellerController::class, 'createLessonProcessing'])->name('seller.addLessonProcessing');
    
    Route::get('/seller/quan-ly-khoa-hoc/chi-tiet-id-{course}/Tao-Cau-Hoi{lesson}', [SellerController::class, 'createQuestion'])->name('seller.addQuestion');
    Route::post('/seller/quan-ly-khoa-hoc/chi-tiet-id-{course}/Tao-Cau-Hoi{lesson}/xu-ly', [SellerController::class, 'createQuestionProcessing'])->name('seller.addQuestionProcessing');
    
    Route::get('/seller/quan-ly-khoa-hoc/chi-tiet-id-{course}/Quan-Ly-Bai-Hoc{lesson}', [SellerController::class, 'manageQuestion'])->name('seller.questionManagement');

});
// admin and seller

// User
Route::get('/dang-nhap', [userController::class, 'login'])->name('user.login');
Route::post('/dang-nhap/xu-ly-dang-ky', [userController::class, 'register'])->name('user.register');
Route::post('/dang-nhap/xu-ly-dang-nhap', [userController::class, 'loginProcessing'])->name('user.loginProcessing');
Route::get('/tai-khoan-cua-toi/dang-xuat', [userController::class, 'logout'])->name('user.logout');

Route::group([
    'middleware' => UserWasLogin::class,
],function(){
    Route::get('/tai-khoan-cua-toi', [userController::class, 'myAccount'])->name('user.myAccount');
    Route::get('/khoa-hoc-cua-toi', [homeViewController::class , 'myCourse'])->name('home.myCourse');
    Route::post('/khoa-hoc/mua-khoa-hoc', [homeViewController::class, 'buyCourse'])->name('home.buyCourse');
    Route::post('/khoa-hoc/ma-{course_id}/danh-gia', [homeViewController::class, 'ratingCourse'])->name('home.ratingCourse');
    Route::get('/khoa-hoc/xem-khoa-{course_id}/bai-{lesson_id}', [homeViewController::class, 'learnCourse'])->name('home.learnCourse');
    Route::get('/khoa-hoc/xem-khoa-{course_id}/bai-{lesson_id}/bai-ke-tiep', [homeViewController::class, 'next_lesson'])->name('home.nextLesson');
    Route::post('/khoa-hoc/xem-khoa-{course_id}/bai-{lesson_id}/kiem-tra-cau-tra-loi', [homeViewController::class, 'check_answer'])->name('home.checkAnswer');
    Route::get('/khoa-hoc/xem-khoa-{course_id}/hoan-thanh', [homeViewController::class, 'done_course'])->name('home.doneCourse');
});

Route::get('/khoa-hoc', [homeViewController::class , 'course'])->name('home.course');

Route::get('/khoa-hoc/ma-{course_id}', [homeViewController::class , 'viewCourse'])->name('home.viewCourse');
Route::get('/khoa-hoc/ma-{course_id}/dat-hang', [homeViewController::class , 'orderCourse'])->name('home.orderCourse');
Route::get('/khoa-hoc/ma-{course_id}/huy-dat-hang', [homeViewController::class , 'unOrderCourse'])->name('home.unOrderCourse');

Route::get('/gio-hang', [homeViewController::class , 'myCart'])->name('home.myCart');

Route::get('/', [homeViewController::class , 'course'])->name('home.course');

// User