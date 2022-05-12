<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::all();

        return view('dashboard.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admins.create');
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
            'name' => 'required',
            'email' => 'required|email|',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            // 'active' => 'required|boolean',

        ]);
        $active = $request->active ? 1 : 0;
        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'active' => $request->active ? 1 : 0

        ]);
        $admin->save();


        return redirect()->route('admins.index')->with('success', 'Admin created successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {

        return view('dashboard.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|',

        ]);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'active' => $request->active ? 1 : 0
        ]);

        $admin->save();

        return redirect()->route('admins.index')->with('success', 'Admin updated successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        $isDeleted = $admin->delete();

        if ($isDeleted) {
            return response()->json([
                'title' => 'Success', 'text' => 'Admin Deleted Successfuly', 'icon' => 'success'
            ], Response::HTTP_OK);
        } else {

            return response()->json([
                'title' => 'Failde', 'text' => 'Admin Delete Failde', 'icon' => 'error'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
