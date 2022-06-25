<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Floor;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::paginate(20);
        // $rooms = Room::with('floor')->paginate(20);
        $building = Building::all();
        $i = 1;
        $current = $rooms->currentPage() - 1;
        return view('dashboard.room.index', compact('rooms', 'i', 'current'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings = Building::all();
        return view('dashboard.room.create', compact('buildings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'floor' => 'required'
        ];
        $data = $request->only(['name', 'floor']);
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $room = new Room();
            $room->name = $request->name;
            $room->description=$request->description;
            $room->floor_id = $request->floor;
            $room->save();
            if($request->hidden=="createRoom"){
                return redirect()->route('floors.show',$room->floor_id)->with('success', 'Floor created successfully')
                ->with('type', 'success');
            }else{
                return redirect()->route('rooms.index')->with('success', 'Floor created successfully')
                ->with('type', 'success');
            }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $floors = floor::where('building_id', $id)->pluck('name', 'id');
        return json_encode($floors);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $buildings = Building::all();
        return view('dashboard.room.edit', compact('buildings', 'room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $rules = [
            'name' => 'required|string',
            'floor' => 'required'
        ];
        $data = $request->only(['name', 'floor']);
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $room->name = $request->name;
            $room->floor_id = $request->floor;
            $room->save();
            if($request->editRoom=="editRoom"){
                return redirect()->route('floors.show',$room->floor_id)->with('success', 'Floor created successfully')
                ->with('type', 'success');
            }
            return redirect()->route('rooms.index')->with('success', 'Floor created successfully')
                ->with('type', 'success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $isRoom = $room->delete();
        if ($isRoom) {
            return response()->json([
                'title' => 'Success',
                'text' => 'Room Deleted Successfuly', 'icon' => 'success'
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'title' => 'Failde',
                'text' => 'Room Delete Failde', 'icon' => 'error'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
