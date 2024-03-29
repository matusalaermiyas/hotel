<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CasherController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\SystemAdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

// ---

// Authentication route needed for login, logout, and register functionalities
Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('signin', 'signin')->name('auth.signin')->middleware('auth.if.logged');
    Route::get('signup', 'signup')->name('auth.signup')->middleware('auth.if.logged');
    Route::post('signin', 'signin_post')->name('auth.signin.post');
    Route::post('signup', 'signup_post')->name('auth.signup.post');
    Route::get('logout', 'logout')->name('auth.logout');

    Route::get('change/password', 'changePassword')->name('auth.change.password');
    Route::post('change/password', 'changePasswordStore')->name('auth.change.post');
});

//---

// Casher routes
Route::prefix('casher')->controller(CasherController::class)->middleware('auth.casher')->group(function () {
    Route::get('/', 'dashboard')->name('casher.dashboard');
    Route::get('generate/report', 'generateReport')->name('casher.generate.report');
    Route::get('view/authorized/payroll', 'viewAuthorizedPayroll')->name('casher.view.authorized.payroll');
});

//---


// Hotel information routes
Route::prefix('company')->controller(PageController::class)->group(function () {
    Route::get('about', 'about')->name('about');
    Route::get('gallery', 'gallery')->name('gallery');
    Route::get('testimonials', 'testimonials')->name('testimonials');
    Route::get('locations', 'locations')->name('locations');
    Route::get('contacts', 'contacts')->name('contacts');
    Route::get('create/testimonials', 'createTestimonials')->name('customer.comment');
    Route::post('store/testimonials', 'storeTestimonials')->name('customer.comment.store');
    Route::get('rooms', 'rooms')->name('rooms');
});

// ---


// Customer routes for room reservation
Route::prefix('customer')->controller(CustomerController::class)->group(function () {
    Route::post('reserve', 'reserve')->name('customer.reserve');
    Route::post('reserve/finish', 'reserve_post')->name('customer.reserve.post');
    Route::get('direct/reservation', 'get_direct_reservation')->name('customer.get.direct.reservation');
    Route::post('direct/reservation', 'store_direct_reservation')->name('customer.store.direct.reservation');
});

// ---


// Customer relalted reservations
Route::prefix('customer')->controller(CustomerController::class)->middleware('auth.customer')->group(function () {
    Route::get('dashboard', 'dashboard')->name('customer.dashboard');
    Route::get('reservations', 'reservations')->name('customer.reservations');
    Route::get('cancel/reservations', 'cancelReservations')->name('customer.cancel.reservations');
    Route::get('cancel/reservations/{id}', 'cancelReservation')->name('customer.cancel.reservation');
    Route::get('update/reservations', 'updateReservations')->name('customer.update.reservations');
    Route::get('update/reservations/{id}', 'updateReservation')->name('customer.update.reservation');
    Route::put('update/reservation/{id}', 'updateReservationStore')->name('customer.put.reservation');

    Route::get('make/payment', 'paymentForm')->name('customer.view.payment');
    Route::post('make/payment/done', 'paymentFinished')->name('customer.finish.payment');
});

//---

// Manager related routes
Route::prefix('manager')->controller(ManagerController::class)->middleware('auth.manager')->group(function () {
    Route::get('/', 'dashboard')->name('manager.dashboard');
    Route::get('view/comments', 'viewComments')->name('manager.view.comments');
    Route::get('approve/comment/{id}', 'approveComment')->name('manager.approve.comment');
    Route::get('permit/leave', 'permitLeave')->name('manager.permit.leave');
    Route::get('permit/leave/approve/{id}', 'permitLeaveApprove')->name('manager.approve.leave');
    Route::get('authorize/payroll', 'authorizePayroll')->name('manager.authorize.payroll');
    Route::get('authorize/employee/payroll/{id}', 'authorizeEmployeePayroll')->name('manager.authorize.employee.payroll');
});

// ---

// Reception related routes
Route::prefix('reception')->controller(ReceptionController::class)->middleware('auth.reception')->group(function () {
    Route::get('/', 'dashboard')->name('reception.dashboard');
    Route::get('reservations', 'reservations')->name('reception.reservations');
    Route::get('book/reservation', 'bookReservation')->name('reception.reserve.book');
    Route::get('cancel/reservation', 'cancelReservation')->name('reception.cancel');
    Route::get('update/reservation', 'updateReservation')->name('reception.update');
    Route::get('generate/report', 'generateReport')->name('reception.generate.report');

    Route::get('book/reservation/{id}', 'bookAReservation')->name('reception.book.reservation');
    Route::get('cancel/reservations/{id}', 'cancelAReservation')->name('reception.cancel.reservation');
    Route::get('update/reservations/{id}', 'updateAReservation')->name('reception.update.reservation');
    Route::put('update/reservation/{id}', 'updateReservationStore')->name('reception.put.reservation');
    Route::get('ask/leave', 'askLeave')->name('reception.ask.leave');
    Route::post('store/ask/leave', 'storeAskLeave')->name('reception.store.leave');
    Route::get('see/leave/result', 'seeLeaveResult')->name('reception.see.leave.result');
});

// ---

// System admin related routes
Route::prefix('system-admin')->controller(SystemAdminController::class)->middleware('auth.sa')->group(function () {
    Route::get('/', 'dashboard')->name('system_admin.dashboard');


    Route::get('create/employee/account', 'showCreateAccount')->name('sa.create.account');
    Route::post('create/employee/account/store', 'storeCreateAccount')->name('sa.create.account.store');

    Route::get('view/employees', 'viewEmployees')->name('system_admin.view.employees');
    Route::get('add/employee', 'addEmployee')->name('system_admin.add.employee');
    Route::get('update/employee', 'updateEmployee')->name('system_admin.update.employee');
    Route::get('terminate/employee', 'terminateEmployee')->name('system_admin.terminate.employee');
    Route::post('add/employee', 'addEmployeePost')->name('sa.add.employee');
    Route::get('delete/employee/{id}', 'deleteEmployee')->name('sa.delete.employee');
    Route::get('update/employee/{id}', 'updateEmployeeCreate')->name('sa.update.form');
    Route::post('update/employee/{id}', 'updateEmployeeStore')->name('sa.update.employee.store');

    Route::get('view/rooms', 'viewRooms')->name('sa.view.rooms');
    Route::get('add/room', 'addRoom')->name('system_admin.add.room');
    Route::get('delete/room', 'deleteRoom')->name('system_admin.delete.room');
    Route::get('update/room', 'updateRoom')->name('system_admin.update.room');
    Route::get('delete/room/{id}', 'deleteRoomPost')->name('sa.delete.room');
    Route::get('update/room/{id}', 'updateRoomCreate')->name('sa.update.room');
    Route::post('update/room/{id}', 'updateRoomStore')->name('sa.update.room.store');
    Route::post('add/room', 'addRoomPost')->name('sa.add.room');
});
// ---