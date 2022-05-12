<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Weak;
use App\Models\Floor;
use App\Models\Building;
use App\Models\Collage_time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CollageTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $buildings = Building::all();
        $collages = Collage_time::all();
        $days = Weak::all();
        return view('dashboard.collage_time.index', compact('collages', 'days', 'buildings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings = Building::all();
        $days = Weak::all();
        return view('dashboard.collage_time.create', compact('buildings', 'days'));
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
            // 'name' => 'required|string',
            'day' => 'required',
            'building' => 'required',
            'floor' => 'required',
            'room' => 'required'

        ];
        $data = $request->only(['day', 'building', 'floor', 'room']);
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $collage_time = new Collage_time();
            $collage_time->week_id = $request->day;
            $collage_time->room_id = $request->room;
            $collage_time->period_8 = $request->period_8;
            $collage_time->period_9 = $request->period_9;
            $collage_time->period_10 = $request->period_10;
            $collage_time->period_11 = $request->period_11;
            $collage_time->period_12 = $request->period_12;
            $collage_time->period_13 = $request->period_1;
            $collage_time->period_14 = $request->period_2;
            $collage_time->save();
            return redirect()->route('collage_time.index')->with('success', 'collage created successfully')
                ->with('type', 'success');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collage_time  $collage_time
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rooms = Room::where('floor_id', $id)->pluck('name', 'id');
        return json_encode($rooms);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collage_time  $collage_time
     * @return \Illuminate\Http\Response
     */
    public function edit(Collage_time $collage_time)
    {
        $buildings = Building::all();
        $days = Weak::all();
        return view('dashboard.collage_time.edit', compact('collage_time', 'buildings', 'days'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collage_time  $collage_time
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collage_time $collage_time)
    {
        $rules = [
            // 'name' => 'required|string',
            'day' => 'required',
            'building' => 'required',
            'floor' => 'required',
            'room' => 'required'

        ];
        $data = $request->only(['day', 'building', 'floor', 'room']);
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $collage_time->week_id = $request->day;
            $collage_time->room_id = $request->room;
            $collage_time->period_8 = $request->period_8;
            $collage_time->period_9 = $request->period_9;
            $collage_time->period_10 = $request->period_10;
            $collage_time->period_11 = $request->period_11;
            $collage_time->period_12 = $request->period_12;
            $collage_time->period_13 = $request->period_1;
            $collage_time->period_14 = $request->period_2;
            $collage_time->save();
            return redirect()->route('collage_time.index')->with('success', 'collage update successfully')
                ->with('type', 'success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collage_time  $collage_time
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collage_time $collage_time)
    {
        $isDeleted = $collage_time->delete();
        if ($isDeleted) {
            return response()->json([
                'message' => 'success deleted',
                'title' => 'collage_time is deleted successfully', 'icon' => 'success'
            ], Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => 'success deleted',
                'title' => 'collage_time is deleted successfully', 'icon' => 'success'
            ], Response::HTTP_OK);
        }
    }
}
