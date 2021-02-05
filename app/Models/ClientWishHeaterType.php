<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ClientWishHeaterType extends Model
{

    use SoftDeletes;

    protected $table = 'client_wishes_heater_types';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_wish_id', 'heater_type_id'
    ];

    public function clientWish()
    {
        return $this->belongsTo(ClientWish::class, 'client_wish_id')->withDefault();
    }

    public function heaterType(){
        return $this->belongsTo(heaterType::class, 'heater_type_id')->withDefault();
    }
}