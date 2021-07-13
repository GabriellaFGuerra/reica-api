<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::with('images', 'address')->get();
        return response()->json($properties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = new Address;
        $address->fill($request->all());
        $address->save();

        $property = new Property;
        $property->fill($request->all());
        $property->address_id = $address->id;
        $property->save();

        return response()->json($property, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::with('images', 'address')->find($id);

        if (!$property) {
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        return response()->json($property);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $property = Property::find($id);
        $property->fill($request->all());
        $property->save();

        $address = Address::where('id', $property->address_id)->first();
        $address->fill($request->all());
        $address->save();

        return response()->json($property, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);

        if (!$property) {
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }

        $property->delete();
        return response()->json([
            'message' => 'Record deleted successfuly',
        ], 200);
    }
}
