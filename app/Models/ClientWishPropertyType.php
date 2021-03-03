<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ClientWishPropertyType extends Model
{

    protected $table = 'client_wishes_property_types';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_wish_id', 'property_type_id'
    ];

    public function clientWish()
    {
        return $this->belongsTo(ClientWish::class, 'client_wish_id')->withDefault();
    }

    public function heaterType(){
        return $this->belongsTo(heaterType::class, 'property_type_id')->withDefault();
    }
}