<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;
////////////////////////
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\SalerController;
use App\Http\Controllers\Api\InstallerController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ForgotPasswordController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register-api',[UserApiController::class,'register_api']);
Route::post('/confirm-account-api',[UserApiController::class,'confirm_account_api']);
Route::post('/login-api',[UserApiController::class,'login_api']);
Route::post('/forgot-password-api',[UserApiController::class,'forgot_password_api']);
Route::get('/get-states-api',[UserApiController::class,'get_states_api']);
Route::post('/get-cities-api',[UserApiController::class,'get_cities_api']);
Route::get('/get-inspection-api',[UserApiController::class,'get_inspection_api']);
Route::post('/update-inspection-api',[UserApiController::class,'update_inspection_api']);
Route::post('/save-img-canvar-api',[UserApiController::class,'save_img_canvar_api']);
Route::post('/update-inspection-detail-document-api',[UserApiController::class,'update_inspection_detail_document_api']);
Route::post('/remove-document-api',[UserApiController::class,'remove_document_api']);
Route::post('/save-area',[UserApiController::class,'save_area']);
Route::post('/delete-area',[UserApiController::class,'delete_area']);
Route::post('/save-location',[UserApiController::class,'save_location']);
Route::get('/get-list-inspec',[UserApiController::class,'get_list_inspec']);
Route::get('/get-potentials-list-api',[UserApiController::class,'get_potentials_list_api']);
Route::get('/get-detail-potentials-api/{id}',[UserApiController::class,'get_detail_potentials_api']);
Route::post('/update-status-potentials-api',[UserApiController::class,'update_status_potentials_api']);
Route::post('/add-install-api',[UserApiController::class,'add_install_api']);
Route::get('/get-list-install-api',[UserApiController::class,'get_list_install_api']);
Route::post('/delete-install-api',[UserApiController::class,'delete_install_api']);
Route::get('/get-install-by-id-api/{id}',[UserApiController::class,'get_install_by_id_api']);
Route::post('/update-install-api',[UserApiController::class,'update_install_api']);
Route::get('/get-contact-api',[UserApiController::class,'get_contact_api']);
Route::get('/get-list-sale-api',[UserApiController::class,'get_list_sale_api']);
Route::post('/add-user-sale-api',[UserApiController::class,'add_user_sale_api']);
Route::post('/delete-sale-api',[UserApiController::class,'delete_sale_api']);
Route::get('/get-data-contact',[UserApiController::class,'get_data_contact']);
Route::post('/update-user-contact-api',[UserApiController::class,'update_user_contact_api']);
Route::get('/get-bank-api',[UserApiController::class,'get_bank_api']);
Route::get('/get-list-project-api',[UserApiController::class,'get_list_project_api']);
Route::get('/create-project-tracker-api/{id}',[UserApiController::class,'create_project_tracker_api']);
Route::post('/update-project-detail',[UserApiController::class,'update_project_detail']);
Route::get('/getDetailUser/{id}', [UserApiController::class, 'getDetailUser']);