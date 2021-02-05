<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $attributes = [
        'mail' => null,
        'cellephone' => null,
        'phone' => null,
        'archive' => false
    ];

    protected $fillable = [
        'firstname', 'lastname', 'phone', 'cellphone', 'archive', 'mail', 'user_id', 'client_type_id'
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
        return $this->hasOne(clientWish::class, 'client_id');
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = [
    //    'password',
    //];
}
