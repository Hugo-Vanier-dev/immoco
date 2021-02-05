<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class HeaterType extends Model
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

    public function clientWishesHeaterTypes()
    {
        return $this->hasMany(ClientWishHeaterType::class, 'heater_type_id');
    }

    public function propertiesHeaterTypes() {
        return $this->hasMany(PropertyHeaterType::class, 'heater_type_id');
    }
}