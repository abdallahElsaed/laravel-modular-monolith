<?php

namespace Modules\DoctorAvailability\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\DoctorAvailability\Database\Factories\SlotFactory;

class Slot extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id',
        'doctor_id',
        'time',
        'is_reserved',
        'cost',
        'created_at',
        'updated_at'
    ];

}
