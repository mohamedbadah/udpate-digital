<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Building;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::withCount('floors')->get();

        return view('dashboard.buildings.index', compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.buildings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $building = new Building();
        $building->name = $request->name;
        $building->save();
        return redirect()->route('buildings.index')->with('success', 'Building created successfully')
            ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building)
    {
        $floors_count = $building->floors()->count();
        $buildingFloors = $building->floors;
        return view('dashboard.buildings.buildingFloor', compact('buildingFloors', 'building', 'floors_count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building)
    {
        return view('dashboard.buildings.edit', compact('building'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $building->update([
            'name' => $request->name,
        ]);
        $building->save();
        return redirect()->route('buildings.index')->with('success', 'Building updated successfully')
            ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building)
    {
        $isDeleted = $building->delete();
        if ($isDeleted) {
            return response()->json([
                'title' => 'success',
                'text' => 'Building Deleted Successfuly',
                'icon' => 'success'
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'title' => 'error',
                'text' => ' Building Not Deleted',
                'icon' => 'error'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    public function createFloor($id)
    {
        $building = Building::where('id',$id)->first();
        return view('dashboard.buildings.createFloor',compact('building'));
    }
    public function editFloor($id)
    {
        $floor = Floor::where('id',$id)->first();
        return view('dashboard.buildings.editFloor',compact('floor'));
    }
}
