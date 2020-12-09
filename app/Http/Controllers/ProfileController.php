<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Posts;
use App\Follows;
use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $user_id = Auth::id();

        $data['posts'] = Posts::where('user_id', $user_id)->get();
        $data['following'] = Follows::where('user_id', $user_id)->count();
        $data['followers'] = Follows::where('follow_user_id', $user_id)->count();

        return view('profile')->with($data);;
    }
}
