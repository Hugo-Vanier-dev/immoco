<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

 class Property extends Model
 {
    use SoftDeletes;
    protected $table = 'properties';
    protected $fillable = ['price','label','descriptive','longitude','latitude','city','address','zipcode','livingArea','area','gardenArea','floorNumber','piecesNumber','bedroomNumber','bathroomNumber','wcNumber','buildingNumber','bearing','doorNumber','garden','garage','cellar','atic','parking','opticalFiber','swimmingPool','balcony','archive','created_at','updated_at','deleted_at','id_clients','id_properties_types','id_shutters_types'];

}