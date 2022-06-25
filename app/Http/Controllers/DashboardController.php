<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Collage_time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $post=Post::all();
        $post_e=Post::with(['category'=>function($query){
            $query->where('name','=','event');
        }])->get();
        $post_n=Post::with(['category'=>function($query){
            $query->where('name','=','news');
        }])->get();
        $post_u=Post::with(['category'=>function($query){
            $query->where('name','=','unvirsty');
        }])->get();
        
        // $collage_time=Collage_time::all();
        // echo $post_e;
        return view('dashboard.index',compact('post','post_e','post_n','post_u'));
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/login');
    }
}
