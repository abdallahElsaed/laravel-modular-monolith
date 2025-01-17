<?php

namespace Modules\AppointmentBooking\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id',
        'slot_id',
        'patient_id',
        'reserved_at',
        'status',
    ];

}
