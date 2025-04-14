<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Operation_area;
use App\Http\Controllers\Operation;
use App\Http\Controllers\BankController;
use App\Http\Controllers\ProposedController;
use App\Http\Controllers\FinancialDetail;
use App\Http\Controllers\AimObjectiveController;
use App\Http\Controllers\BasicInformation;
use App\Http\Controllers\CityController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\DistrictController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/table', function () {
    return view('table');
});

Route::get('/datatables', function () {
    return view('datatables');
});

Route::get('/users', function () {
    return view('userlist');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/form', function () {
    return view('form');
});

Route::get('/formadvance', function () {
    return view('formadvance');
});

Route::get('/profile', function () {
    return view('profile');
});
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/signin', [LoginController::class, 'make_login']); 
Route::get('register', [LoginController::class, 'register']);
Route::get('form', [HomeController::class, 'membersDetail']);
Route::get('form2', [HomeController::class, 'farm2']);

Route::get('basic-information', [BasicInformation::class, 'information']);
Route::get('membership', [MemberController::class, 'membership']);
Route::get('founding-body-member', [MemberController::class, 'foundingmember']);
Route::get('executive-member/{id}', [MemberController::class, 'executive']);

Route::get('general-member', [MemberController::class, 'general']);
Route::get('financial-detail', [FinancialDetail::class, 'financial']);
Route::get('operation', [Operation::class, 'Operation']);
Route::get('operation_area', [Operation_area::class, 'operation_area']);
Route::post('addarea/add', [Operation_area::class, 'storeOperationarea'])->name('addarea.add');
Route::delete('areaofoperation/delete/{id}', [Operation_area::class, 'deleteOperationarea'])
->name('areaofoperation.delete');
Route::post('addoperation/add', [Operation::class, 'storeOperation'])->name('addoperation.add');
Route::get('addbank', [BankController::class, 'bankdetail']);
Route::post('addbank/add', [BankController::class, 'storebank'])->name('addbank.add');
Route::delete('bank/delete/{id}', [BankController::class, 'deletebank'])->name('bank.delete');


Route::get('proposed', [ProposedController::class, 'ProposedBank']);
Route::post('addproposed/add', [ProposedController::class, 'storeproposed'])->name('addproposed.add');
Route::delete('proposedfinances/delete/{id}', [ProposedController::class, 'deleteproposedfinances'])
->name('proposedfinances.delete');
Route::post('financial-detail/add', [FinancialDetail::class, 'storeFinancial'])->name('financial-detail.add');
Route::get('aim-objective', [AimObjectiveController::class, 'Aimobjective']);
Route::post('aim-objective/add', [AimObjectiveController::class, 'storeobjective'])->name('aim-objective.add');
Route::delete('aims/delete/{id}', [AimObjectiveController::class, 'deleteobjective'])->name('aims.delete');
Route::post('basic-information/add', [BasicInformation::class, 'storeinformation'])->name('basic-information.add');
Route::get('city', [CityController::class, 'city']);
Route::post('city/add',[CityController::class,'storecity'])->name('city.add');
Route::delete('city/delete/{id}',[CityController::class,'deletecity'])->name('city.delete');
Route::post('register/add', [LoginController::class, 'storeregister'])->name('register.add');
Route::get('roles', [RolesController::class, 'addrole']);
Route::get('districts', [DistrictController::class, 'showdistricts']);
Route::post('AddDistrict/add', [DistrictController::class, 'storedistrict'])->name('AddDistrict.add');
Route::post('AddRoles/add', [RolesController::class, 'storeRoles'])->name('AddRoles.add');
Route::get('add-user', [LoginController::class, 'adduser']);
Route::post('add-user/add', [LoginController::class, 'storeUser'])->name('add-user.add');
Route::post('/add-member', [MemberController::class, 'store'])->name('add.member');
Route::post('/add-general', [MemberController::class, 'storegeneral'])->name('add.general');

Route::post('/founding-body-member', [MemberController::class, 'storefounding'])->name('add.founding');


Route::put('executive-member/save', [MemberController::class, 'saveExecutive'])->name('executive.save');
Route::get('summary', [MemberController::class, 'Summery'])->name('summary');
Route::get('application/{id}', [MemberController::class, 'AddLater']);

Route::get('ngo_forwarded_apps', [MemberController::class, 'ngo_forwarded_apps_list'])->name('ngo_forwarded_apps');

Route::get('list-executive', [MemberController::class, 'listexecutive']);
Route::post('/submit-first-app', [MemberController::class, 'submitfirstapp'])->name('submit.first.app');

Route::get('app_summary_district', [MemberController::class, 'Summery_district'])->name('app_summary_district');
Route::get('application/district/view/{id}', [MemberController::class, 'AddLater_district']);

Route::post('/forward.app.district', [MemberController::class, 'forwardappdistrict'])->name('forward.app.district');
Route::post('/reverse.app.district', [MemberController::class, 'reverseappdistrict'])->name('reverse.app.district');


Route::get('app_summary_directorate', [MemberController::class, 'Summery_directorate'])->name('app_summary_directorate');

Route::get('application/directorate/view/{id}', [MemberController::class, 'AddLater_directorate']);

Route::post('/forward.app.directorate', [MemberController::class, 'approvedappdirectorate'])->name('forward.app.directorate');
Route::post('/reverse.app.directorate', [MemberController::class, 'reverseappdirectorate'])->name('reverse.app.directorate');
Route::post('/reject.app.directorate', [MemberController::class, 'rejectappdirectorate'])->name('reject.app.directorate');

Route::get('/loadNGOtimeline', [MemberController::class, 'loadNGOtimeline'])->name('loadNGOtimeline');
Route::get('do_forwarded_apps_list', [MemberController::class, 'do_forwarded_apps_list'])->name('do_forwarded_apps_list');

Route::get('app_summary_ad', [MemberController::class, 'ad_apps_list'])->name('app_summary_ad');
Route::get('application/ad/view/{id}', [MemberController::class, 'view_app_ad']);

Route::post('/forward.app.ad', [MemberController::class, 'forwardapp_ad'])->name('forward.app.ad');
Route::post('/reverse.app.ad', [MemberController::class, 'reverseapp_ad'])->name('reverse.app.ad');

Route::get('ad_forwarded_apps_list', [MemberController::class, 'ad_forwarded_apps_list'])->name('ad_forwarded_apps_list');

Route::get('app_summary_dd', [MemberController::class, 'dd_apps_list'])->name('app_summary_dd');
Route::get('application/dd/view/{id}', [MemberController::class, 'view_app_dd']);

Route::post('/forward.app.dd', [MemberController::class, 'forwardapp_dd'])->name('forward.app.dd');
Route::post('/reverse.app.dd', [MemberController::class, 'reverseapp_dd'])->name('reverse.app.dd');

Route::get('dd_forwarded_apps_list', [MemberController::class, 'dd_forwarded_apps_list'])->name('dd_forwarded_apps_list');

Route::get('dg_accepted_apps_list', [MemberController::class, 'dg_accepted_apps_list'])->name('dg_accepted_apps_list');
Route::get('dg_rejected_apps_list', [MemberController::class, 'dg_rejected_apps_list'])->name('dg_rejected_apps_list');

Route::get('ad_accepted_apps_list', [MemberController::class, 'ad_accepted_apps_list'])->name('ad_accepted_apps_list');


