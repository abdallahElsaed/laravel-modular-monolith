<?php

use Illuminate\Support\Facades\Route;
use Modules\DoctorAvailability\Http\Controllers\DoctorAvailabilityController;

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

// Route::middleware(['auth:sanctum'])->prefix('v1')->group(
//     function () {
//         Route::apiResource('doctoravailability', DoctorAvailabilityController::class)->names('doctoravailability');
//     }
// );


Route::group(
    [
        'prefix' => 'doctor-availability',
    ], function () {
        Route::get('show-slots', [DoctorAvailabilityController::class, 'showSlots']);
        Route::post('add-slot', [DoctorAvailabilityController::class, 'addSlot']);
    }
);
