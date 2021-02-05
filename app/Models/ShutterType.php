<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ShutterType extends Model
{

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value'
    ];

    public function clientWishesShutterTypes()
    {
        return $this->hasMany(ClientWishShutterType::class, 'shutter_type_id');
    }

    public function propertiesShutterTypes() {
        return $this->hasMany(PropertyShutterType::class, 'shutter_type_id');
    }
}