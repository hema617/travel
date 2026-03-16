<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function index(Request $request)
    {
        try {
            $city=City::paginate(10);
            return (new ResponseService())->success('City List Get Successfully',$city);
            
        } catch (\Throwable $th) {
            return (new ResponseService())->error('Error in fetching details ');

        }
    }
    public function store(Request $request)
    {
        $city = City::create($request->all());

        return response()->json([
            "message" => "City created",
            "data" => $city
        ]);
    }

    public function show($id)
    {
        return City::find($id);
    }

    public function update(Request $request,$id)
    {
        $city = City::find($id);
        $city->update($request->all());

        return response()->json([
            "message" => "City updated"
        ]);
    }

    public function destroy($id)
    {
        City::destroy($id);

        return response()->json([
            "message"=>"City deleted"
        ]);
    }
}