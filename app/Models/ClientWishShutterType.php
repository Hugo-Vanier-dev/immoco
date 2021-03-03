<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ClientWishShutterType extends Model
{

    protected $table = 'client_wishes_shutter_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_wish_id', 'shutter_type_id'
    ];

    public function clientWish()
    {
        return $this->belongsTo(ClientWish::class, 'client_wish_id')->withDefault();
    }

    public function heaterType(){
        return $this->belongsTo(HeaterType::class, 'shutter_type_id')->withDefault();
    }
}