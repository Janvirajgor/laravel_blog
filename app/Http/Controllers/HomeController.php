<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function profile(Request $request, $id)
    {
        $user = User::find($id);
        return view('auth.profile', compact('user'));
    }

    public function editProfile(Request $request, $id)
    {
        $user = User::find($id);
        return view('auth.editprofile', compact('user'));
    }

    public function updateProfile(Request $request, User $users, $id)
    {
        $user = $users->find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        $user->find($request->user_id);

        return redirect('/profile/' . $request->user_id);
    }
}
