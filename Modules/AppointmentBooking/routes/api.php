<?php

use Illuminate\Support\Facades\Route;
use Modules\AppointmentBooking\Http\Controllers\AppointmentBookingController;
use Modules\AppointmentBooking\Http\Controllers\AppointmentBooking0Controller;

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
        'prefix' => 'appointment-booking',
    ], function () {
        Route::get('show-available-slots', [AppointmentBookingController::class, 'showAvailableSlots']);
        Route::post('book-appointment', [AppointmentBookingController::class, 'bookAppointment']);
    }
);
