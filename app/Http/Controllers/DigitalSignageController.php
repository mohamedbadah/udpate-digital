<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Room;
use App\Models\Weak;
use App\Models\Floor;
use App\Models\Building;
use App\Models\Collage_time;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DigitalSignageController extends Controller
{
    public function index($build, $floors)
    {
        $floor = Floor::where('raspberry_pi_ip_address', $floors)->first();
        $posts=Post::all();
        $building = Building::where('name', $build)->first();
        $collages = Collage_time::all();
        if ($building && $floor) {
            return view('digital', compact('collages', 'floor', 'building','posts'));
        } else {
            return view('404');
        }
    }
    public function show($build, $floors)
    {
        $floor = Floor::where('raspberry_pi_ip_address', $floors)->first();
        $posts=Post::all();
        $building = Building::where('name', $build)->first();
        $collages = Collage_time::all();
        if ($building && $floor) {
            return response()->json([
                'collages' => $collages,'floor'=>$floor,'building'=>$building,'posts'=>$posts
            ], Response::HTTP_OK);
        }
    }
    public function indexs($build, $floors)
    {
        $floor = Floor::where('raspberry_pi_ip_address', $floors)->first();
        $building = Building::where('name', $build)->first();
        $buildings = Building::all();
        $collages = Collage_time::all();
        $days = Weak::all();
        // if (is_null($floor->raspberry_pi_ip_address)) {
        //     echo "hello";
        // }
        if ($building && $floor) {
            return view('dashboard.collage_time.index', compact('collages', 'days', 'buildings'));
        } else {
            return view('404');
        }
    }
}
