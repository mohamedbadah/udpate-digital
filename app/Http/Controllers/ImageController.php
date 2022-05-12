<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 1;
        $images = image::paginate(20);
        $current = $images->currentPage() - 1;
        return view('dashboard.images.index', ['images' => $images, 'i' => $i, 'current' => $current]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'img' => 'required|image|max:2048|mimes:png,jpg'
        ]);
        if ($validation) {
            $image = new image();
            $ex = $request->file('img')->getClientOriginalExtension();
            $new_image = 'image_' . time() . '_' . '.' . $ex;
            $request->file('img')->move(public_path('upload'), $new_image);
            $image->name = $new_image;
            $image->save();
            return redirect()->route('images.index')->with('success', 'images created successfully')->with('type', 'success');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(image $image)
    {
        return view('dashboard.images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, image $image)
    {
        $validation = $request->validate([
            'img' => 'required'
        ]);
        if ($validation) {
            $ex = $request->file('img')->getClientOriginalExtension();
            $new_image = 'image_' . time() . '_' . '.' . $ex;
            Storage::disk('upload')->delete($image->name);
            $request->file('img')->move(public_path('upload'), $new_image);
            $image->name = $new_image;
            $image->save();
            return redirect()->route('images.index')->with('success', 'images created successfully')->with('type', 'success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(image $image)
    {
        $isDeleted = $image->delete();
        if ($isDeleted) {
            return response()->json([
                'title' => 'Success', 'text' => 'image Deleted Successfuly', 'icon' => 'success'
            ], Response::HTTP_OK);
        } else {

            return response()->json([
                'title' => 'Failde', 'text' => 'image Delete Failde', 'icon' => 'error'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
