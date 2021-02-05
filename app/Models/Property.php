<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

 class Property extends Model
 {
    use SoftDeletes;

    protected $table = 'properties';

    protected $attributes = [
        'gardenArea' => null,
        'floorNumber' => null,
        'piecesNumber' => null,
        'bedroomNumber' => null,
        'bathroomNumber' => null,
        'wcNumber' => null,
        'garden' => false,
        'garage' => false,
        'cellar' => false,
        'atic' => false,
        'parking' => false,
        'opticalFiber' => false,
        'swimmingPool' => false,
        'balcony' => false,
    ];

    protected $fillable = ['price','label','descriptive','longitude','latitude','city','address','zipcode','livingArea','area','gardenArea','floorNumber','piecesNumber','bedroomNumber','bathroomNumber','wcNumber','buildingNumber','bearing','doorNumber','garden','garage','cellar','atic','parking','opticalFiber','swimmingPool','balcony','archive','client_id','property_type_id'];

    public function client(){
        return $this->belongsTo(Client::class, 'client_id')->withDefault();
    }

    public function propertyType(){
        return $this->belongsTo(PropertyType::class, 'property_type_id')->withDefault();
    }

    public function propertiesHeaterTypes(){
        return $this->hasMany(PropertyHeaterType::class, 'property_id');
    }

    public function propertiesShutterTypes(){
        return $this->hasMany(PropertyShutterType::class, 'property_id');
    }
}