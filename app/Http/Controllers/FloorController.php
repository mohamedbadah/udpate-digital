<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Floor;
use App\Models\Building;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::all();
        $floors = Floor::all();
        return view('dashboard.floors.index', compact('floors', 'buildings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings = Building::all();
        return view('dashboard.floors.create', compact('buildings'));
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
            'raspberry_pi_ip_address' => 'required|string|max:255',
            'building_id' => 'required|exists:buildings,id',
        ],[
            'name.required'=>'الاسم مطلوب',
            'raspberry_pi_ip_address.required'=>'ip مطلوب'
        ]);

        $floor = new Floor();
        $floor->name = $request->name;
        $floor->description = $request->description;
        $floor->building_id = $request->building_id;
        $floor->raspberry_pi_ip_address = $request->raspberry_pi_ip_address;
        $isSave=$floor->save();
        if($isSave){
            if($request->createFloor=="createFloor"){
                return redirect()->route('buildings.show',$floor->building_id)->with('success', 'Floor created successfully')
                ->with('type', 'success');  
            }else{
                return redirect()->route('floors.index')->with('success', 'Floor created successfully')
                ->with('type', 'success');
            }
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function show(Floor $floor)
    {
        $floor_Rooms=$floor->rooms;
       
        return view('dashboard.floors.floor_room', compact('floor','floor_Rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function edit(Floor $floor)
    {
        $buildings = Building::all();
        return view('dashboard.floors.edit', compact('floor', 'buildings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Floor $floor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'raspberry_pi_ip_address' => 'required|string|max:255',
            'building_id' => 'required|exists:buildings,id',
        ]);

        $floor->update([
            'name' => $request->name,
            'description' => $request->description,
            'building_id' => $request->building_id,
            'raspberry_pi_ip_address' => $request->raspberry_pi_ip_address,
        ]);
        $floor->save();
        if($request->createFloor=="createFloor"){
            return redirect()->route('buildings.show',$floor->building_id)->with('success', 'Floor updated successfully')->with('type', 'success'); 
        }
        return redirect()->route('floors.index')->with('success', 'Floor updated successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Floor $floor)
    {
        $isDeleted = $floor->delete();
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
    public function createRoom($id)
    {
        $floor = Floor::where('id',$id)->first();
        return view('dashboard.floors.createRoom',compact('floor'));
    }
    public function editRoom($id)
    {
        $room = Room::where('id',$id)->first();
        return view('dashboard.floors.editRoom',compact('room'));
    }
}
