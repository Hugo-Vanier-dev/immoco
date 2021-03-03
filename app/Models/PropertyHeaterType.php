<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PropertyHeaterType extends Model
{

    protected $table = 'properties_heater_types';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_id', 'heater_type_id'
    ];

    public function clientWish()
    {
        return $this->belongsTo(Property::class, 'property_id')->withDefault();
    }

    public function heaterType(){
        return $this->belongsTo(HeaterType::class, 'heater_type_id')->withDefault();
    }
}