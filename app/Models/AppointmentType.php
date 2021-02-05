<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AppointmentType extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'value'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'appointment_type_id');
    }
}