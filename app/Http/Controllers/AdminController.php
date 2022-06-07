<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class AdminController extends Controller
{
    // public function index()
    // {
    //      return view('admin/login');
    // }

    public function dashboard(User $user, Post $post)
    {
        $total_user = $user->where('id', '>=', 1)->get()->count();
        $total_blog = $post->where('id', '>=', 1)->get()->count();

        return view('admin.dashboard', compact('total_user', 'total_blog'));
    }

    public function blogList(Request $request, Post $post)
    {
        $posts =  $post->where([
            ['id', '>=', 1],
            ['title', '!=', Null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('title', 'LIKE', '%' . $search . '%')->get();
                }
            }]
        ])
            ->orderBy('id', 'desc')
            ->paginate(3);

        return view('admin.bloglist', compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 3);
    }

    public function userlist()
    {
    }

    public function blogcreate()
    {
    }
}
