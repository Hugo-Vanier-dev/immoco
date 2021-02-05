<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PropertyShutterType extends Model
{

    use SoftDeletes;

    protected $table = 'properties_shutter_types';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_id', 'shutter_type_id'
    ];

    public function clientWish()
    {
        return $this->belongsTo(Property::class, 'property_id')->withDefault();
    }

    public function heaterType(){
        return $this->belongsTo(ShutterType::class, 'shutter_type_id')->withDefault();
    }
}