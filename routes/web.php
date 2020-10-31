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
Route::get('/show-page-dashboard-sale',[UserController::class,'show_page_dashboard_sale']);
Route::get('/show-page-list-project',[UserController::class,'show_page_list_project']);
Route::get('/show-page-detail-project/{id}',[UserController::class,'show_page_detail_project']);
Route::get('/get-list-contact',[UserController::class,'get_list_contact']);