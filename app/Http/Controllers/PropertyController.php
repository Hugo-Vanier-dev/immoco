<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Property;
use App\Models\Client;
use App\Models\ClientWish;
use App\Models\ClientWishHeaterType;
use App\Models\ClientWishPropertyType;
use App\Models\ClientWishShutterType;
use App\Models\PropertyHeaterType;
use App\Models\PropertyShutterType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PropertyController extends BaseController
{
    public function getById($id)
    {
        try {
            $property = Property::findOrFail($id);
            return response()->json($property);
        } catch (\Exception $e) {
            return response()->json('Propriété non trouvé', 404);
        }
    }

    public function getByClient($clientId)
    {
        try {
            $client = Client::findOrFail($clientId);
            $properties = Property::where('id_clients', $client->id)->get();
            return response()->json($properties);
        } catch (\Exception $e) {
            return response()->json('Client non trouvé', 404);
        }
    }

    public function getAll(Request $request)
    {
        $limit = $request->get('limit');
        $sort = $request->get('sort');
        $sortOrder = $request->get('sortOrder');
        $nbPage = $request->get('nbPage');
        $offset = $limit * $nbPage;
        $filter = $request->has('filter') ? $request->get('filter') : null;
        if ($filter != null) {
            $properties = Property::where('firstname', 'like', '%' . $filter . '%')
                ->orWhere('lastname', 'like', '%' . $filter . '%')
                ->orWhere('mail', 'like', '%' . $filter . '%')
                ->orWhere('cellphone', 'like', '%' . $filter . '%')
                ->orWhere('phone', 'like', '%' . $filter . '%')
                ->skip($offset)
                ->limit($limit)
                ->orderBy($sort, $sortOrder)
                ->get();
        } else {
            $properties = Property::skip($offset)
                ->limit($limit)
                ->orderBy($sort, $sortOrder)
                ->get();
        }

        return response()->json($properties);
    }

    public function getByClientWish($clientWishId){
        try {
            $clientWish = ClientWish::findOrFail($clientWishId);
            $priceMin = $clientWish->price * 7 /10;
            $priceMax = $clientWish->price * 115/100;
            $whereArray = [
                ['price', '>=', $priceMin],
                ['price', '<=', $priceMax],
            ];
            if($clientWish->livingArea != null){
                array_push($whereArray, ['livingArea', '>=', $clientWish->livingArea * 75/100]);
            }
            if($clientWish->area != null){
                array_push($whereArray, ['area', '>=', $clientWish->area * 1/2]);
            }
            if($clientWish->gardenArea != null){
                array_push($whereArray, ['gardenArea', '>=', $clientWish->gardenArea * 1/2]);
            }
            /**
             * TODO :: voir avec l'équipe comment gérer le floorNumber, piecesNumber,
             */
            if($clientWish->bedroomNumber != null){
                if($clientWish->bedroomNumber < 3){
                    array_push($whereArray, ['bedroomNumber', '>=', $clientWish->bedroomNumber]);
                }else if($clientWish->bedroomNumber < 6){
                    array_push($whereArray, ['bedroomNumber', '>=', $clientWish->bedroomNumber - 1]);
                }else if($clientWish->bedroomNumber < 9){
                    array_push($whereArray, ['bedroomNumber', '>=', $clientWish->bedroomNumber - 2]);
                }else if($clientWish->bedroomNumber < 11){
                    array_push($whereArray, ['bedroomNumber', '>=', $clientWish->bedroomNumber - 3]);
                }else if($clientWish->bedroomNumber < 16){
                    array_push($whereArray, ['bedroomNumber', '>=', $clientWish->bedroomNumber - 4]);
                }else if($clientWish->bedroomNumber < 21){
                    array_push($whereArray, ['bedroomNumber', '>=', $clientWish->bedroomNumber - 5]);
                }else if($clientWish->bedroomNumber < 50){
                    array_push($whereArray, ['bedroomNumber', '>=', $clientWish->bedroomNumber - 10]);
                }else if($clientWish->bedroomNumber < 100){
                    array_push($whereArray, ['bedroomNumber', '>=', $clientWish->bedroomNumber - 20]);
                }else if($clientWish->bedroomNumber < 500){
                    array_push($whereArray, ['bedroomNumber', '>=', $clientWish->bedroomNumber - 100]);
                }else if($clientWish->bedroomNumber < 1000){
                    array_push($whereArray, ['bedroomNumber', '>=', $clientWish->bedroomNumber - 200]);
                }else {
                    array_push($whereArray, ['bedroomNumber', '>=', $clientWish->bedroomNumber - 500]);
                }
            }

            if($clientWish->bathroomNumber != null){
                if($clientWish->bathroomNumber < 3){
                    array_push($whereArray, ['bathroomNumber', '>=', $clientWish->bathroomNumber]);
                }else if($clientWish->bathroomNumber < 5){
                    array_push($whereArray, ['bathroomNumber', '>=', $clientWish->bathroomNumber - 1]);
                }else if($clientWish->bathroomNumber < 7){
                    array_push($whereArray, ['bathroomNumber', '>=', $clientWish->bathroomNumber - 2]);
                }else if($clientWish->bathroomNumber < 10){
                    array_push($whereArray, ['bathroomNumber', '>=', $clientWish->bathroomNumber - 3]);
                }else if($clientWish->bathroomNumber < 16){
                    array_push($whereArray, ['bathroomNumber', '>=', $clientWish->bathroomNumber - 4]);
                }else if($clientWish->bathroomNumber < 21){
                    array_push($whereArray, ['bathroomNumber', '>=', $clientWish->bathroomNumber - 5]);
                }else if($clientWish->bathroomNumber < 50){
                    array_push($whereArray, ['bathroomNumber', '>=', $clientWish->bathroomNumber - 10]);
                }else if($clientWish->bathroomNumber < 100){
                    array_push($whereArray, ['bathroomNumber', '>=', $clientWish->bathroomNumber - 20]);
                }else if($clientWish->bathroomNumber < 500){
                    array_push($whereArray, ['bathroomNumber', '>=', $clientWish->bathroomNumber - 100]);
                }else if($clientWish->bathroomNumber < 1000){
                    array_push($whereArray, ['bathroomNumber', '>=', $clientWish->bathroomNumber - 200]);
                }else {
                    array_push($whereArray, ['bathroomNumber', '>=', $clientWish->bathroomNumber - 500]);
                }
            }

            if($clientWish->wcNumber != null){
                if($clientWish->wcNumber < 3){
                    array_push($whereArray, ['wcNumber', '>=', $clientWish->wcNumber]);
                }else if($clientWish->wcNumber < 5){
                    array_push($whereArray, ['wcNumber', '>=', $clientWish->wcNumber - 1]);
                }else if($clientWish->wcNumber < 7){
                    array_push($whereArray, ['wcNumber', '>=', $clientWish->wcNumber - 2]);
                }else if($clientWish->wcNumber < 10){
                    array_push($whereArray, ['wcNumber', '>=', $clientWish->wcNumber - 3]);
                }else if($clientWish->wcNumber < 16){
                    array_push($whereArray, ['wcNumber', '>=', $clientWish->wcNumber - 4]);
                }else if($clientWish->wcNumber < 21){
                    array_push($whereArray, ['wcNumber', '>=', $clientWish->wcNumber - 5]);
                }else if($clientWish->wcNumber < 50){
                    array_push($whereArray, ['wcNumber', '>=', $clientWish->wcNumber - 10]);
                }else if($clientWish->wcNumber < 100){
                    array_push($whereArray, ['wcNumber', '>=', $clientWish->wcNumber - 20]);
                }else if($clientWish->wcNumber < 500){
                    array_push($whereArray, ['wcNumber', '>=', $clientWish->wcNumber - 100]);
                }else if($clientWish->wcNumber < 1000){
                    array_push($whereArray, ['wcNumber', '>=', $clientWish->wcNumber - 200]);
                }else {
                    array_push($whereArray, ['wcNumber', '>=', $clientWish->wcNumber - 500]);
                }
            }

            if($clientWish->garden){
                array_push($whereArray, ['garden', '=', true]);
            }
            if($clientWish->garage){
                array_push($whereArray, ['garage', '=', true]);
            }
            if($clientWish->cellar){
                array_push($whereArray, ['cellar', '=', true]);
            }
            if($clientWish->atic){
                array_push($whereArray, ['atic', '=', true]);
            }
            if($clientWish->parking){
                array_push($whereArray, ['parking', '=', true]);
            }
            if($clientWish->opticalFiber){
                array_push($whereArray, ['opticalFiber', '=', true]);
            }
            if($clientWish->swimmingPool){
                array_push($whereArray, ['swimmingPool', '=', true]);
            }
            if($clientWish->balcony){
                array_push($whereArray, ['balcony', '=', true]);
            }

            $clientWishPropertyTypes = ClientWishPropertyType::where('client_wish_id', $clientWish->id);
            $clientWishHeaterTypes = ClientWishHeaterType::where('client_wish_id', $clientWish->id);
            $clientWishShutterTypes = ClientWishShutterType::where('client_wish_id', $clientWish->id);

            if(count($clientWishPropertyTypes) > 0){
                $clientWishOrWherePropertyTypesArray = [];
                foreach($clientWishPropertyTypes as $clientWichPropertyType){
                    array_push($clientWishOrWherePropertyTypesArray, ['property_type_id', '=', $clientWichPropertyType]);
                }
                $clientWishOrWherePropertyTypesArrayFirstIndex = array_shift($clientWishOrWherePropertyTypesArray);
                $properties = Property::where($whereArray)
                                        ->where($clientWishOrWherePropertyTypesArrayFirstIndex)
                                        ->orWhere($clientWishOrWherePropertyTypesArray)
                                        ->get();
            }

            

            $properties = Property::where($whereArray)->get();

            return response()->json($properties, 200);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function create(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'price' => 'required|integer|min:4|max:10',
                    'label' => 'required',
                    'longitude' => 'required|numeric',
                    'latitude' => 'required|numeric',
                    'city' => 'required|max:100',
                    'address' => 'required',
                    'zipcode' => 'required|max:5',
                    'livingArea' => 'required|max:6',
                    'area' => 'required|max:6',
                    'gardenArea' => 'max:6',
                    'floorNumber' => 'max:4',
                    'piecesNumber' => 'max:4',
                    'bedroomNumber' => 'max:4',
                    'bathroomNumber' => 'max:4',
                    'wcNumber' => 'max:4',
                    'buildingNumber' => 'max:4',
                    'bearing' => 'max:5',
                    'doorNumber' => 'max:5',
                    'garden' => 'boolean',
                    'garage' => 'boolean',
                    'cellar' => 'boolean',
                    'atic' => 'boolean',
                    'parking' => 'boolean',
                    'opticalFibre' => 'boolean',
                    'swimmingPool' => 'boolean',
                    'balcony' => 'boolean',
                    'archive' => 'boolean',
                    'client_id' => 'required|integer',
                    'property_type_id' => 'required|integer',
                    'heater_type_id' => 'array',
                    'shutter_type_id' => 'array'
                ],
                [
                    'required' => 'Vous devez remplir ce champ',
                    'integer' => 'La donnée entrée dans ce champ doit être un entier',
                    'numeric' => 'La donnée entrée dans ce champ doit être un nombre',
                    'max' => 'La donnée entrée est trop grosse.',
                    'min' => 'La donnée entrée est trop petite'
                ]
            );
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
    
            DB::beginTransaction();
    
            $property = new Property();
    
            $property->price = $request->price;
            $property->label = $request->label;
            $property->description = $request->description;
            $property->longitude = $request->longitude;
            $property->latitude = $request->latitude;
            $property->city = $request->city;
            $property->adress = $request->adress;
            $property->zipCode = $request->cipCode;
            $property->livingArea = $request->livingArea;
            $property->area = $request->area;
            $property->gardenArea = $request->gardenArea;
            $property->floorNumber = $request->floorNumber;
            $property->piecesNumber = $request->piecesNumber;
            $property->bedroomNumber = $request->bedroomNumber;
            $property->bathroomNumber = $request->bathroomNumber;
            $property->wcNumber = $request->wcNumber;
            $property->buildingNumber = $request->buildingNumber;
            $property->bearing = $request->bearing;
            $property->doorNumber = $request->doorNumber; 
            $property->garden = $request->garden;
            $property->garage = $request->garage;
            $property->cellar = $request->cellar;
            $property->atic = $request->atic;
            $property->parking = $request->parking;
            $property->opticalFiber = $request->opticalFiber;
            $property->swimmingPool = $request->swimmingPool;
            $property->balcony = $request->balcony;
            $property->client_id = $request->client_id;
            $property->property_type_id = $request->property_type_id;
    
            $isPropertySaved = $property->save();
    
            if(!$isPropertySaved){
                DB::rollBack();
            }

            $propertyId = $property->id;
    
            if ($request->has('heater_type_id')) {
                foreach ($request->heater_type_id as $heaterTypeId) {
                    $propertyHeaterTypes = new PropertyHeaterType();
                    $propertyHeaterTypes->client_wish_id = $propertyId;
                    $propertyHeaterTypes->heater_type_id = $heaterTypeId;
                    $isSaved = $propertyHeaterTypes->save();
                    if(!$isSaved){
                        DB::rollBack();
                    }
                }
            }
            if ($request->has('shutter_type_id')) {
                foreach ($request->shutter_type_id as $shutterTypeId) {
                    $propertyShutterTypes = new PropertyShutterType();
                    $propertyShutterTypes->client_wish_id = $propertyId;
                    $propertyShutterTypes->shutter_type_id = $shutterTypeId;
                    $isSaved = $propertyShutterTypes->save();
                    if(!$isSaved){
                        DB::rollBack();
                    }
                }
            }
            DB::commit();

            return response()->json(['message' => 'La propriété à bien été ajouté.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
        
    }

    public function update($id, Request $request)
    {
        try {
            $property = Property::findOrFail($id);
            $validator = Validator::make(
                $request->all(),
                [
                    'price' => 'required|integer',
                    'label' => 'required',
                    'longitude' => 'required|numeric',
                    'latitude' => 'required|numeric',
                    'city' => 'required|max:100',
                    'address' => 'required',
                    'zipcode' => 'required|max:5',
                    'livingArea' => 'required|max:6',
                    'area' => 'required|max:6',
                    'gardenArea' => 'max:6',
                    'floorNumber' => 'max:4',
                    'piecesNumber' => 'max:4',
                    'bedroomNumber' => 'max:4',
                    'bathroomNumber' => 'max:4',
                    'wcNumber' => 'max:4',
                    'buildingNumber' => 'max:4',
                    'bearing' => 'max:5',
                    'doorNumber' => 'max:5',
                    'garden' => 'boolean',
                    'garage' => 'boolean',
                    'cellar' => 'boolean',
                    'atic' => 'boolean',
                    'parking' => 'boolean',
                    'opticalFibre' => 'boolean',
                    'swimmingPool' => 'boolean',
                    'balcony' => 'boolean',
                    'archive' => 'boolean',
                    'client_id' => 'required|integer',
                    'property_type_id' => 'required|integer',
                    'heater_type_id' => 'array',
                    'shutter_type_id' => 'array'
                ],
                [
                    'required' => 'Vous devez remplir ce champ',
                    'integer' => 'La donnée entrée dans ce champ doit être un entier',
                    'numeric' => 'La donnée entrée dans ce champ doit être un nombre',
                    'max' => 'La donnée entrée est trop grosse.',
                    'min' => 'La donnée entrée est trop petite'
                ]
            );
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
    
            DB::beginTransaction();
    
            $property->price = $request->price;
            $property->label = $request->label;
            $property->description = $request->description;
            $property->longitude = $request->longitude;
            $property->latitude = $request->latitude;
            $property->city = $request->city;
            $property->adress = $request->adress;
            $property->zipCode = $request->zipcode;
            $property->livingArea = $request->livingArea;
            $property->area = $request->area;
            $property->gardenArea = $request->gardenArea;
            $property->floorNumber = $request->floorNumber;
            $property->piecesNumber = $request->piecesNumber;
            $property->bedroomNumber = $request->bedroomNumber;
            $property->bathroomNumber = $request->bathroomNumber;
            $property->wcNumber = $request->wcNumber;
            $property->buildingNumber = $request->buildingNumber;
            $property->bearing = $request->bearing;
            $property->doorNumber = $request->doorNumber; 
            $property->garden = $request->garden;
            $property->garage = $request->garage;
            $property->cellar = $request->cellar;
            $property->atic = $request->atic;
            $property->parking = $request->parking;
            $property->opticalFiber = $request->opticalFiber;
            $property->swimmingPool = $request->swimmingPool;
            $property->balcony = $request->balcony;
            $property->client_id = $request->client_id;
            $property->property_type_id = $request->property_type_id;
    
            $isPropertySaved = $property->save();
    
            if(!$isPropertySaved){
                DB::rollBack();
            }

            $propertyId = $property->id;
    
            $propertyHeaterTypesArray = PropertyHeaterType::where('property_id', $propertyId)->get();

            if (count($propertyHeaterTypesArray) > 0) {
                foreach ($propertyHeaterTypesArray as $oldData) {
                    $doIDel = true;
                    foreach ($request->heater_type_id as $newdata) {
                        if ($oldData->heater_type_id == $newdata) {
                            $doIDel = false;
                        }
                    }
                    if ($doIDel) {
                        $isDel = $oldData->delete();
                        if(!$isDel){
                            DB::rollBack();
                        }
                    }
                }
            }

            if ($request->has('heater_type_id')) {
                foreach ($request->heater_type_id as $heaterTypeId) {
                    $doIAdd = true;
                    foreach ($propertyHeaterTypesArray as $oldData) {
                        if ($oldData->heater_type_id == $heaterTypeId) {
                            $doIAdd = false;
                        }
                    }
                    if ($doIAdd) {
                        $propertyHeaterTypes = new PropertyHeaterType();
                        $propertyHeaterTypes->client_wish_id = $propertyId;
                        $propertyHeaterTypes->heater_type_id = $heaterTypeId;
                        $isAdd = $propertyHeaterTypes->save();
                        if(!$isAdd){
                            DB::rollBack();
                        }
                    }
                }
            }

            $propertyShutterTypesArray = PropertyShutterType::where('property_id', $propertyId)->get();

            if (count($propertyShutterTypesArray) > 0) {
                foreach ($propertyShutterTypesArray as $oldData) {
                    $doIDel = true;
                    foreach ($request->shutter_type_id as $newdata) {
                        if ($oldData->shutter_type_id == $newdata) {
                            $doIDel = false;
                        }
                    }
                    if ($doIDel) {
                        $isDel = $oldData->delete();
                        if(!$isDel){
                            DB::rollBack();
                        }
                    }
                }
            }

            if ($request->has('shutter_type_id')) {
                foreach ($request->shutter_type_id as $shutterTypeId) {
                    $doIAdd = true;
                    foreach ($propertyShutterTypesArray as $oldData) {
                        if ($oldData->shutter_type_id == $shutterTypeId) {
                            $doIAdd = false;
                        }
                    }
                    if ($doIAdd) {
                        $propertyShutterTypes = new PropertyShutterType();
                        $propertyShutterTypes->client_wish_id = $propertyId;
                        $propertyShutterTypes->shutter_type_id = $shutterTypeId;
                        $isAdd = $propertyShutterTypes->save();
                        if(!$isAdd){
                            DB::rollBack();
                        }
                    }
                }
            }
            DB::commit();

            return response()->json(['message' => 'La propriété à bien été ajouté.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function delete($id)
    {
        try {
            $property = Property::findOrFail($id);
            $isDeleted = $property->delete();
            if (!$isDeleted) {
                return response()->json('Il y a eu un problème lors de la suppression', 500);
            } else {
                return response()->json('Propriété supprimer', 200);
            }
        } catch (\Exception $e) {
            return response()->json('Property non trouvé', 404);
        }
    }
}
