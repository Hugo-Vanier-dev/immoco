<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

 class ClientWish extends Model
 {
    use SoftDeletes;

    protected $table = 'client_wishes';

    protected $attributes = [
        'longitude' => null,
        'latitude' => null,
        'livingArea' => null,
        'area' => null,
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

    protected $fillable = ['price', 'longitude','latitude', 'livingArea','area','gardenArea','floorNumber','piecesNumber','bedroomNumber','bathroomNumber','wcNumber','garden','garage','cellar','atic','parking','opticalFiber','swimmingPool','balcony', 'client_id'];

    public function client(){
        return $this->belongsTo(Client::class, 'client_id')->withDefault();
    }

    public function clientWishesHeaterTypes(){
        return $this->hasMany(ClientWishHeaterType::class, 'client_wish_id');
    }

    public function clientWishesPropertyTypes(){
        return $this->hasMany(ClientWishPropertyType::class, 'client_wish_id');
    }

    public function clientWishesShutterTypes(){
        return $this->hasMany(ClientWishShutterType::class, 'client_wish_id');
    }

}