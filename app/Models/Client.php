<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use SoftDeletes, HasFactory;

    protected $attributes = [
        'mail' => null,
        'cellphone' => null,
        'phone' => null,
        'archive' => false,
        'streetNumber' => null,
        'birthdate' => null,
        'zipCode' => null,
        'city' => null,
        'streetName' => null,
        'description' => null,
        'sexe' => 1
    ];

    protected $fillable = [
        'firstname', 'lastname', 'phone', 'cellphone', 'archive', 'mail', 'streetNumber', 'birthdate', 'zipCode', 'city', 'streetName', 'description', 'user_id', 'client_type_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function clientType()
    {
        return $this->belongsTo(ClientType::class, 'client_type_id')->withDefault();
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'client_id');
    }

    public function properties()
    {
        return $this->hasMany(Property::class, 'client_id');
    }

    public function clientWish(){
        return $this->hasOne(ClientWish::class, 'client_id');
    }

}
