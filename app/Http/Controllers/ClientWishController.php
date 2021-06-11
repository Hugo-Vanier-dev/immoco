<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientWish;
use App\Models\ClientWishHeaterType;
use App\Models\ClientWishPropertyType;
use App\Models\ClientWishShutterType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ClientWishController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function getById($id)
    {
        try {
            $clientWish = ClientWish::with('client')
                                        ->with('clientWishesHeaterTypes')
                                        ->with('clientWishesPropertyTypes')
                                        ->with('clientWishesShutterTypes')
                                        ->findOrFail($id);
            return response()->json($clientWish);
        } catch (\Exception $e) {
            return response()->json('Souhait client non trouvé', 404);
        }
    }
    //
    public function getByClient($clientId)
    {
        try {
            $client = Client::with('client')
                                ->with('clientWishesHeaterTypes')
                                ->with('clientWishesPropertyTypes')
                                ->with('clientWishesShutterTypes')
                                ->findOrFail($clientId);
            $clientWish = ClientWish::where('id_clients', $client->id)->get();
            return response()->json($clientWish, 200);
        } catch (\Exception $e) {
            return response()->json('Client non trouvé', 404);
        }
    }

    public function create(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'price' => 'required|integer',
                    'longitude' => 'numeric',
                    'latitude' => 'numeric',
                    'livingArea' => 'integer',
                    'area' => 'integer',
                    'gardenArea' => 'integer',
                    'floorNumber' => 'integer',
                    'piecesNumber' => 'integer',
                    'bedroomNumber' => 'integer',
                    'bathroomNumber' => 'integer',
                    'wcNumber' => 'integer',
                    'garden' => 'boolean',
                    'garage' => 'boolean',
                    'cellar' => 'boolean',
                    'atic' => 'boolean',
                    'parking' => 'boolean',
                    'opticalFiber' => 'boolean',
                    'swimmingPool' => 'boolean',
                    'balcony' => 'boolean',
                    'client_id' => 'required|integer',
                    'heater_type_id' => 'array',
                    'property_type_id' => 'array',
                    'shutter_type_id' => 'array',
                ],
                [
                    'required' => 'Vous devez remplir ce champ',
                    'integer' => 'La donnée entrée dans ce champ doit être un entier',
                    'numeric' => 'La donnée entrée dans ce champ doit être un nombre'
                ]
            );
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            DB::beginTransaction();
            $clientWish = new ClientWish();

            $clientWish->price = $request->price;
            $clientWish->longitude = $request->longitude;
            $clientWish->latitude = $request->latitude;
            $clientWish->livingArea = $request->livingArea;
            $clientWish->area = $request->area;
            $clientWish->gardenArea = $request->gardenArea;
            $clientWish->floorNumber = $request->floorNumber;
            $clientWish->piecesNumber = $request->piecesNumber;
            $clientWish->bedroomNumber = $request->bedroomNumber;
            $clientWish->bathroomNumber = $request->bathroomNumber;
            $clientWish->wcNumber = $request->wcNumber;
            $clientWish->garden = $request->garden;
            $clientWish->garage = $request->garage;
            $clientWish->cellar = $request->cellar;
            $clientWish->atic = $request->atic;
            $clientWish->parking = $request->parking;
            $clientWish->opticalFiber = $request->opticalFiber;
            $clientWish->swimmingPool = $request->swimmingPool;
            $clientWish->balcony = $request->balcony;
            $clientWish->client_id = $request->client_id;

            $isClientWishSaved = $clientWish->save();

            if(!$isClientWishSaved){
                DB::rollBack();
            }

            $clientWishId = $clientWish->id;

            if ($request->has('heater_type_id')) {
                foreach ($request->heater_type_id as $heaterTypeId) {
                    $clientWishHeaterTypes = new ClientWishHeaterType();
                    $clientWishHeaterTypes->client_wish_id = $clientWishId;
                    $clientWishHeaterTypes->heater_type_id = $heaterTypeId;
                    $isSaved = $clientWishHeaterTypes->save();
                    if(!$isSaved){
                        DB::rollBack();
                    }
                }
            }
            if ($request->has('property_type_id')) {
                foreach ($request->property_type_id as $propertyTypeId) {
                    $clientWishPropertyTypes = new ClientWishPropertyType();
                    $clientWishPropertyTypes->client_wish_id = $clientWishId;
                    $clientWishPropertyTypes->property_type_id = $propertyTypeId;
                    $isSaved = $clientWishPropertyTypes->save();
                    if(!$isSaved){
                        DB::rollBack();
                    }
                }
            }
            if ($request->has('shutter_type_id')) {
                foreach ($request->shutter_type_id as $shutterTypeId) {
                    $clientWishShutterTypes = new ClientWishShutterType();
                    $clientWishShutterTypes->client_wish_id = $clientWishId;
                    $clientWishShutterTypes->shutter_type_id = $shutterTypeId;
                    $isSaved = $clientWishShutterTypes->save();
                    if(!$isSaved){
                        DB::rollBack();
                    }
                }
            }
            DB::commit();

            return response()->json(['message' => 'Le souhait client à bien été ajouté.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function put($id, Request $request)
    {
        try {
            $clientWish = ClientWish::findOrFail($id);
            $validator = Validator::make(
                $request->all(),
                [
                    'price' => 'required|integer',
                    'longitude' => 'numeric',
                    'latitude' => 'numeric',
                    'livingArea' => 'integer',
                    'area' => 'integer',
                    'gardenArea' => 'integer',
                    'floorNumber' => 'integer',
                    'piecesNumber' => 'integer',
                    'bedroomNumber' => 'integer',
                    'bathroomNumber' => 'integer',
                    'wcNumber' => 'integer',
                    'garden' => 'boolean',
                    'garage' => 'boolean',
                    'cellar' => 'boolean',
                    'atic' => 'boolean',
                    'parking' => 'boolean',
                    'opticalFiber' => 'boolean',
                    'swimmingPool' => 'boolean',
                    'balcony' => 'boolean',
                    'client_id' => 'required|integer',
                    'heater_type_id' => 'array',
                    'property_type_id' => 'array',
                    'shutter_type_id' => 'array',
                ],
                [
                    'required' => 'Vous devez remplir ce champ',
                    'integer' => 'La donnée entrée dans ce champ doit être un entier',
                    'numeric' => 'La donnée entrée dans ce champ doit être un nombre'
                ]
            );
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            DB::beginTransaction();

            $clientWish->price = $request->price;
            $clientWish->longitude = $request->longitude;
            $clientWish->latitude = $request->latitude;
            $clientWish->livingArea = $request->livingArea;
            $clientWish->area = $request->area;
            $clientWish->gardenArea = $request->gardenArea;
            $clientWish->floorNumber = $request->floorNumber;
            $clientWish->piecesNumber = $request->piecesNumber;
            $clientWish->bedroomNumber = $request->bedroomNumber;
            $clientWish->bathroomNumber = $request->bathroomNumber;
            $clientWish->wcNumber = $request->wcNumber;
            $clientWish->garden = $request->garden;
            $clientWish->garage = $request->garage;
            $clientWish->cellar = $request->cellar;
            $clientWish->atic = $request->atic;
            $clientWish->parking = $request->parking;
            $clientWish->opticalFiber = $request->opticalFiber;
            $clientWish->swimmingPool = $request->swimmingPool;
            $clientWish->balcony = $request->balcony;
            $clientWish->client_id = $request->client_id;

            $isClientWishSaved = $clientWish->save();

            if(!$isClientWishSaved){
                DB::rollBack();
            }

            $clientWishId = $clientWish->id;

            $clientWishHeaterTypesArray = ClientWishHeaterType::where('client_wish_id', $clientWishId)->get();

            if (count($clientWishHeaterTypesArray) > 0) {
                foreach ($clientWishHeaterTypesArray as $oldData) {
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
                    foreach ($clientWishHeaterTypesArray as $oldData) {
                        if ($oldData->heater_type_id == $heaterTypeId) {
                            $doIAdd = false;
                        }
                    }
                    if ($doIAdd) {
                        $clientWishHeaterTypes = new ClientWishHeaterType();
                        $clientWishHeaterTypes->client_wish_id = $clientWishId;
                        $clientWishHeaterTypes->heater_type_id = $heaterTypeId;
                        $isAdd = $clientWishHeaterTypes->save();
                        if(!$isAdd){
                            DB::rollBack();
                        }
                    }
                }
            }

            $clientWishPropertyTypesArray = ClientWishPropertyType::where('client_wish_id', $clientWishId)->get();

            if (count($clientWishPropertyTypesArray) > 0) {
                foreach ($clientWishPropertyTypesArray as $oldData) {
                    $doIDel = true;
                    foreach ($request->property_type_id as $newdata) {
                        if ($oldData->property_type_id == $newdata) {
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

            if ($request->has('property_type_id')) {
                foreach ($request->property_type_id as $propertyTypeId) {
                    $doIAdd = true;
                    foreach ($clientWishPropertyTypesArray as $oldData) {
                        if ($oldData->property_type_id == $propertyTypeId) {
                            $doIAdd = false;
                        }
                    }
                    if ($doIAdd) {
                        $clientWishPropertyTypes = new ClientWishPropertyType();
                        $clientWishPropertyTypes->client_wish_id = $clientWishId;
                        $clientWishPropertyTypes->property_type_id = $propertyTypeId;
                        $isAdd = $clientWishPropertyTypes->save();
                        if(!$isAdd){
                            DB::rollBack();
                        }
                    }
                }
            }

            $clientWishShutterTypesArray = ClientWishShutterType::where('client_wish_id', $clientWishId)->get();

            if (count($clientWishShutterTypesArray) > 0) {
                foreach ($clientWishShutterTypesArray as $oldData) {
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
                    foreach ($clientWishShutterTypesArray as $oldData) {
                        if ($oldData->shutter_type_id == $shutterTypeId) {
                            $doIAdd = false;
                        }
                    }
                    if ($doIAdd) {
                        $clientWishShutterTypes = new ClientWishHeaterType();
                        $clientWishShutterTypes->client_wish_id = $clientWishId;
                        $clientWishShutterTypes->shutter_type_id = $shutterTypeId;
                        $isAdd = $clientWishShutterTypes->save();
                        if(!$isAdd){
                            DB::rollBack();
                        }
                    }
                }
            }
            DB::commit();

            return response()->json(['message' => 'Le souhait client à bien été modifié.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }
    //
    public function delete($id)
    {
        try {
            $clientWish = ClientWish::findOrFail($id);
            $clientWish->delete();
            return response()->json('Souhait client supprimer', 200);
        } catch (\Exception $e) {
            return response()->json('Souhait client non trouvé', 404);
        }
    }
}
