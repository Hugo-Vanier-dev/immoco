<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PropertyType extends Model
{

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value', 'isAppartement'
    ];

    public function properties()
    {
        return $this->hasMany(Property::class, 'property_type_id');
    }

    public function clientWishesPropertyTypes(){
        return $this->hasMany(ClientWishPropertyType::class, 'property_type_id');
    }
}