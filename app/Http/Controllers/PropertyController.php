<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PropertyController extends BaseController
{
    public function getById($id){
        $property = Property::find($id);
        if($property == NULL){
            return response()->json(['message' => 'Propriété non trouvé'], 404);
        }
        return response()->json($property);
    }

    public function getAll(){
        $property = Property::all();
        return response()->json($property);
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(),
        [
           'price'=>'required|numeric|min:4|max:10',
           'label'=>'required|max:50',
           'descriptive'=>'required|max:255',
           'longitude'=>'required',
           'latitude'=>'required',
           'city'=>'required|max:40',
           'address'=>'required|max:80',
           'zipcode'=>'required|max:8',
           'livingArea'=>'required|max:5',
           'area'=>'required|max:5',
           'gardenArea'=>'required|max:5',
           'floorNumber'=>'required|max:5',
           'piecesNumber'=>'required|max:5',
           'bedroomNumber'=>'required|max:5',
           'bathroomNumber'=>'required|max:5',
           'wcNumber'=>'required|max:5',
           'buildingNumber'=>'nullable|max:5',
           'bearing'=>'nullable|max:5',
           'doorNumber'=>'nullable|max:5',
           'garden'=>'boolean',
           'garage'=>'boolean',
           'cellar'=>'boolean',
           'atic'=>'boolean',
           'parking'=>'boolean',
           'opticalFibre'=>'boolean',
           'swimmingPool'=>'boolean',
           'balcony'=>'boolean',
           'interestedClientId'=>'nullable',
           'archive'=>'boolean'

        ])->validate();
        $property = Property::create($request->all());
        return response()->json($property);
    }
    public function delete($id){
        $property = Property::destroy($id);
    }
    public function update(Resquest $request){
       $validator = Validator::make($request->all(),
       [
           'price'=>'required|numeric|min:4|max:10',
           'label'=>'required|max:50',
           'descriptive'=>'required|max:255',
           'longitude'=>'required',
           'latitude'=>'required',
           'city'=>'required|max:40',
           'address'=>'required|max:80',
           'zipcode'=>'required|max:8',
           'livingArea'=>'required|max:5',
           'area'=>'required|max:5',
           'gardenArea'=>'required|max:5',
           'floorNumber'=>'required|max:5',
           'piecesNumber'=>'required|max:5',
           'bedroomNumber'=>'required|max:5',
           'bathroomNumber'=>'required|max:5',
           'wcNumber'=>'required|max:5',
           'buildingNumber'=>'nullable|max:5',
           'bearing'=>'nullable|max:5',
           'doorNumber'=>'nullable|max:5',
           'garden'=>'boolean',
           'garage'=>'boolean',
           'cellar'=>'boolean',
           'atic'=>'boolean',
           'parking'=>'boolean',
           'opticalFibre'=>'boolean',
           'swimmingPool'=>'boolean',
           'balcony'=>'boolean',
           'interestedClientId'=>'nullable',
           'archive'=>'boolean'
    ])->validate();
        $property = Property::find($request->route('id'));
        $property->label = $request->label;
        $property->save();
    }
}