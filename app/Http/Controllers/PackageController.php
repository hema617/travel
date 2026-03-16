<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{

    public function index()
    {
        return Package::all();
    }

    public function store(Request $request)
    {
        $package = Package::create($request->all());

        return response()->json([
            "message"=>"Package created",
            "data"=>$package
        ]);
    }

    public function show($id)
    {
        return Package::find($id);
    }

    public function update(Request $request,$id)
    {
        $package = Package::find($id);
        $package->update($request->all());

        return response()->json([
            "message"=>"Package updated"
        ]);
    }

    public function destroy($id)
    {
        Package::destroy($id);

        return response()->json([
            "message"=>"Package deleted"
        ]);
    }
}