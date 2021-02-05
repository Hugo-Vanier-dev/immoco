<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;

    protected $fillable = ['id','date','city','address','description','user_id','client_id','appointment_type_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function client(){
        return $this->belongsTo(Client::class, 'client_id')->withDefault();
    }

    public function appoitmentType(){
        return $this->belongsTo(AppointmentType::class, 'appointment_type_id')->withDefault();
    }
    
}
