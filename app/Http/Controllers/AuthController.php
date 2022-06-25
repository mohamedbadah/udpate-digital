<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function changePass()
    {
        return view('dashboard.auth.editPass');
    }
    public function updatePass(Request $request)
    {
        // $guard = auth('admin')->check();
        $validator = Validator(
            $request->all(),
            [
                'current_password' => "required|string|password:web",
                'new_password' => 'required|string|min:3|max:30|confirmed',
            ]
        );
        if (!$validator->fails()) {
            $user = auth('web')->user();
            $user->password = Hash::make($request->new_password);
            $isSaved = $user->save();
            return response()->json(['message' => $isSaved ? 'message successfully' : 'faild'], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }
    public function editProfile()
    {
        $view = auth('admin')->check() ? 'cms.admins.edit' : 'cms.users.edit';
        $guard = auth('admin')->check() ? 'admin' : 'user';
        return view($view, [$guard => auth('web')->user(), 'redirect' => false]);
    }
}
