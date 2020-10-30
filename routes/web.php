<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Saler;
use App\Http\Controllers\Installer;
use App\Http\Controllers\Customer;
use App\Http\Controllers\MailController;
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

Route::get('/register',[UserController::class,'register']);
Route::post('/register',[UserController::class,'post_register']);
Route::get('/call-city',[UserController::class,'call_city']);
Route::get('/login',[UserController::class,'login'])->name('login');
Route::get('/site-inspection-detail',[UserController::class,'site_inspection_detail']);
Route::post('/update-inspection-detail',[UserController::class,'update_inspection_detail']);
Route::get('/get-inspection-detail/{id}',[UserController::class,'get_inspection_detail']);
Route::get('/show-list-inspec',[UserController::class,'show_list_inspec']);
Route::post('/save-img-canvar',[UserController::class,'save_img_canvar']);
Route::post('/create-potential',[UserController::class,'create_potential']);
Route::get('/get-potentials-list',[UserController::class,'get_potentials_list'])->name('listPotentials');;
Route::get('/detail-potentials/{id}',[UserController::class,'detail_potentials']);
Route::get('/show-page-install',[UserController::class,'show_page_install']);
Route::get('/show-page-add-install',[UserController::class,'show_page_add_install']);
Route::post('/add-install',[UserController::class,'add_install']);
Route::get('/show-page-edit-install/{id}',[UserController::class,'show_page_edit_install']);
Route::post('/update-install',[UserController::class,'update_install']);
Route::get('/list-customer',[UserController::class,'list_customer']);
Route::get('/list-sale',[UserController::class,'list_sale']);
Route::get('/show-page-add-sale',[UserController::class,'show_page_add_sale']);
Route::post('/add-user-sale',[UserController::class,'add_user_sale']);
Route::get('/show-page-update-user-sale/{id}',[UserController::class,'show_page_update_user_sale']);
Route::post('/update-user-sale',[UserController::class,'update_user_sale']);
Route::post('/update-user-contact',[UserController::class,'update_user_contact']);
Route::get('/show-page-dashboard',[UserController::class,'show_page_dashboard']);
Route::get('/show-page-list-project',[UserController::class,'show_page_list_project']);
Route::get('/show-page-detail-project/{id}',[UserController::class,'show_page_detail_project']);

///
//Route::get('test', [ForgotPasswordController::class, 'test']);
Route::post('admin/newPass', [ForgotPasswordController::class, 'newPass'])->name('newPass');
Route::get('admin/newPass', [ForgotPasswordController::class, 'newPassIndex']);
Route::get('resetPassword/{token}', [ForgotPasswordController::class, 'resetPassword']);
Route::post('forgotPassword', [ForgotPasswordController::class, 'getForgotPassword'])->name('forgotPassword');
Route::get('forgotPassword', [ForgotPasswordController::class, 'getForgotPasswordIndex']);
Route::get('forgot', [ForgotPasswordController::class, 'index'])->name('forgot');
Route::get('admin/login', [AdminPageController::class, 'login']);
Route::get('admin/register', [AdminPageController::class, 'register']);
Route::post('admin/login', [AdminPageController::class, 'postLogin'])->name('postLogin');
//mail
Route::get('mail/send', [MailController::class, 'send'])->name('sendEmail');
//user
    Route::get('user/detail/{id}', [Saler::class, 'getDetailUser']);
    Route::post('user/edit/{id}', [Saler::class, 'getEditUser'])->name('editUser');
//Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {
    Route::get('admin/index', [AdminPageController::class, 'index']);
    Route::get('/admin/logout', [AdminPageController::class, 'logout']);
    Route::get('admin/contact', [AdminPageController::class, 'contact']);

//    Route::group(['prefix' => 'sale'], function () {
        Route::get('test', [Saler::class, 'getListUser']);
        Route::get('admin/sale/list', [Saler::class, 'index'])->name('saler');
        Route::get('admin/sale/get-contact', [Saler::class, 'getContact']);
        Route::get('admin/sale/dasboard', [Saler::class, 'getDasboard']);