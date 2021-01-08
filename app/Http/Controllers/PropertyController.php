<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends BaseController
{
    public function getById($id){
        $property = Property::findOrFail($id);
        return $Properties;
    }

    public function getAll(){
      return Property::all();
    }
    public function create(Request $request){
        $property = Property::create($request->all());
        return $property;
    }
    public function delete($id){
        $property = Property::destroy($id);
    }
    public function update(Resquest $request){
       $property = Property::find($request->route('id'));
       $property->label = $request->label;
       $property->save();
    }
}