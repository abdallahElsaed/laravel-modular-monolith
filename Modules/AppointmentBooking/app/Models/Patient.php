<?php

namespace Modules\AppointmentBooking\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
    ];

}
