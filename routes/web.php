<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\VacationController;
use App\Http\Controllers\SanctionController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SocialSecurityController;
use App\Http\Controllers\MedicalInsuranceController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\AreaManagerController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\JobController;


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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



// all  web routes



// all admin routes/////////////////////////////////////////////////////////////////
Route::group(['prefix' => 'admin'], function () {

    // Without Login
    Route::get('login', [AdminController::class ,'login'])->name('admin.login');
    Route::post('login/store',  [AdminController::class ,'store'])->name('admin.login.store');

    // With Login
    Route::get('dashboard',  [AdminController::class ,'dashboard'])->name('admin.dashboard');
    Route::get('/logout',  [AdminController::class ,'logout'])->name('logout');
    Route::get('/edit',  [AdminController::class ,'edit'])->name('admin.edit');
    Route::put('/update/{admin}',  [AdminController::class ,'update'])->name('admin.update');
//////////////////////////////////
Route::prefix('employees')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::get('/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

    // Additional routes for employee data
    Route::get('/{employee}/personal', [EmployeeController::class, 'personal'])->name('employees.personal');
    Route::get('/{employee}/job', [EmployeeController::class, 'job'])->name('employees.job');
    Route::get('/{employee}/contact', [EmployeeController::class, 'contact'])->name('employees.contact');
});

Route::prefix('salaries')->group(function () {
    Route::get('/', [SalaryController::class, 'index'])->name('salaries.index');
    Route::get('/{employee}/create', [SalaryController::class, 'create'])->name('salaries.create');
    Route::post('/{employee}', [SalaryController::class, 'store'])->name('salaries.store');
    Route::get('/{salary}/edit', [SalaryController::class, 'edit'])->name('salaries.edit');
    Route::put('/{salary}', [SalaryController::class, 'update'])->name('salaries.update');

    // Commissions
    Route::get('/commissions', [CommissionController::class, 'index'])->name('commissions.index');
    Route::get('/{employee}/commissions/create', [CommissionController::class, 'create'])->name('commissions.create');
    Route::post('/{employee}/commissions', [CommissionController::class, 'store'])->name('commissions.store');
});
Route::prefix('vacations')->group(function () {
    Route::get('/', [VacationController::class, 'index'])->name('vacations.index');
    Route::get('/{employee}/create', [VacationController::class, 'create'])->name('vacations.create');
    Route::post('/{employee}', [VacationController::class, 'store'])->name('vacations.store');
    Route::get('/balance', [VacationController::class, 'balance'])->name('vacations.balance');
});

Route::prefix('sanctions')->group(function () {
    Route::get('/', [SanctionController::class, 'index'])->name('sanctions.index');
    Route::get('/{employee}/create', [SanctionController::class, 'create'])->name('sanctions.create');
    Route::post('/{employee}', [SanctionController::class, 'store'])->name('sanctions.store');
    Route::get('/report', [SanctionController::class, 'report'])->name('sanctions.report');
});
Route::prefix('branches')->group(function () {
    Route::get('/', [BranchController::class, 'index'])->name('branches.index');
    Route::get('/create', [BranchController::class, 'create'])->name('branches.create');
    Route::post('/', [BranchController::class, 'store'])->name('branches.store');
    Route::get('/{branch}/edit', [BranchController::class, 'edit'])->name('branches.edit');
    Route::put('/{branch}', [BranchController::class, 'update'])->name('branches.update');
    Route::delete('/{branch}', [BranchController::class, 'destroy'])->name('branches.destroy');
});
Route::prefix('jobs')->group(function () {
    Route::get('/', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/', [JobController::class, 'store'])->name('jobs.store');
    Route::get('/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
    Route::put('/{job}', [JobController::class, 'update'])->name('jobs.update');
    Route::delete('/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
});

Route::prefix('departments')->group(function () {
    Route::get('/', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('/', [DepartmentController::class, 'store'])->name('departments.store');
    Route::get('/{department}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
    Route::put('/{department}', [DepartmentController::class, 'update'])->name('departments.update');
Route::delete('departments/{department}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
});




Route::prefix('insurance')->group(function () {
    // Social Security
    Route::get('/social', [SocialSecurityController::class, 'index'])->name('social.index');
    Route::get('/{employee}/social/create', [SocialSecurityController::class, 'create'])->name('social.create');
    Route::post('/{employee}/social', [SocialSecurityController::class, 'store'])->name('social.store');

    // Medical Insurance
    Route::get('/medical', [MedicalInsuranceController::class, 'index'])->name('medical.index');
    Route::get('/{employee}/medical/create', [MedicalInsuranceController::class, 'create'])->name('medical.create');
    Route::post('/{employee}/medical', [MedicalInsuranceController::class, 'store'])->name('medical.store');
});
Route::prefix('bank-accounts')->group(function () {
    Route::get('/', [BankAccountController::class, 'index'])->name('bank-accounts.index');
    Route::get('/{employee}/create', [BankAccountController::class, 'create'])->name('bank-accounts.create');
    Route::post('/{employee}', [BankAccountController::class, 'store'])->name('bank-accounts.store');
    Route::get('/{account}/edit', [BankAccountController::class, 'edit'])->name('bank-accounts.edit');
    Route::put('/{account}', [BankAccountController::class, 'update'])->name('bank-accounts.update');
});
Route::prefix('supervisors')->group(function () {
    Route::get('/', [SupervisorController::class, 'index'])->name('supervisors.index');
    Route::get('/create', [SupervisorController::class, 'create'])->name('supervisors.create');
    Route::post('/', [SupervisorController::class, 'store'])->name('supervisors.store');
    Route::get('/{supervisor}/edit', [SupervisorController::class, 'edit'])->name('supervisors.edit');
    Route::put('/{supervisor}', [SupervisorController::class, 'update'])->name('supervisors.update');
    Route::delete('/{supervisor}', [SupervisorController::class, 'destroy'])->name('supervisors.destroy');
});

Route::prefix('area-managers')->group(function () {
    Route::get('/', [AreaManagerController::class, 'index'])->name('area-managers.index');
    Route::get('/create', [AreaManagerController::class, 'create'])->name('area-managers.create');
    Route::post('/', [AreaManagerController::class, 'store'])->name('area-managers.store');
    Route::get('/{manager}/edit', [AreaManagerController::class, 'edit'])->name('area-managers.edit');
    Route::put('/{manager}', [AreaManagerController::class, 'update'])->name('area-managers.update');
    Route::delete('/{manager}', [AreaManagerController::class, 'destroy'])->name('area-managers.destroy');
});
Route::prefix('reports')->group(function () {
    Route::get('/employees', [ReportController::class, 'employees'])->name('reports.employees');
    Route::get('/salaries', [ReportController::class, 'salaries'])->name('reports.salaries');
    Route::get('/vacations', [ReportController::class, 'vacations'])->name('reports.vacations');
    Route::get('/sanctions', [ReportController::class, 'sanctions'])->name('reports.sanctions');
    Route::get('/insurance', [ReportController::class, 'insurance'])->name('reports.insurance');
});

});
