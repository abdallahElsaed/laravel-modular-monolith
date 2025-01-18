<?php

use Illuminate\Support\Facades\Route;
use Modules\DoctorAppointmentManagement\Shell\Http\Controllers\DoctorAppointmentManagementController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::group(
    [
        'prefix' => 'doctor-appointment-management',
    ], function () {
        Route::get('show-upcoming-appointment', [DoctorAppointmentManagementController::class, 'showUpcomingAppointment']);
        Route::post('approve-appointment', [DoctorAppointmentManagementController::class, 'approveAppointment']);
    }
);
