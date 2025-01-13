<?php

namespace Modules\DoctorAvailability\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\DoctorAvailability\Database\Factories\DoctorFactory;

class Doctor extends Model
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
