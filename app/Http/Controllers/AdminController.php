<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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

    public function showBlog(Post $post, $id)
    {
        $blogs = $post->find($id);
        return view('admin.showblog', compact('blogs'));
    }

    public function blogcreate()
    {
        return view('admin.createblog');
    }

    public function blogStore(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required | image | mimes:jpg,jpeg,png,jfif,gif | max:20480'
        ]);

        $blog_image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($blog_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/post/';
        $last_img = $up_location . $img_name;
        $blog_image->move($up_location, $img_name);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $last_img;
        $post->user_id = auth()->user()->id;
        $post->created_at = Carbon::now();
        $post->save();

        return redirect()->route('bloglist');
    }

    public function blogEdit(Post $post, $id)
    {
        $blogs = $post->find($id);
        return view('admin/editblog', compact('blogs'));
    }

    public function blogUpdate(Request $request, post $posts, $id)
    {
        $post = $posts->find($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $old_image = $request->old_picture;

        $blog_image = $request->file('picture');

        if ($blog_image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($blog_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'image/post/';
            $last_img = $up_location . $img_name;
            $blog_image->move($up_location, $img_name);

            unlink($old_image);

            $post->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
            ]);
        } else {
            $post->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }
        return redirect()->route('bloglist');
    }

    public function blogDestroy(Request $request, Post $post, $id)
    {
        $id = $post->find($id);
        $image = $post->picture;

        if ($image) {
            unlink($image);
        }

        $id->delete();
        return redirect()->route('bloglist');
    }

    // admin controller for user
    public function userList(Request $request, User $user)
    {
        $users =  $user->where([
            ['id', '>=', 1],
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('name', 'LIKE', '%' . $search . '%')->get();
                }
            }]
        ])
            ->orderBy('id', 'desc')
            ->paginate(3);

        return view('admin.userlist', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 3);
    }

    public function showUser(User $users, $id)
    {
        $user = $users->find($id);
        return view('admin.showuser', compact('user'));
    }

    public function userCreate()
    {
        return view('admin.createuser');
    }

    public function userStore(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return redirect(route('userlist'));
    }

    public function userEdit(User $user, $id)
    {
        $users = $user->find($id);
        return view('admin.edituser', compact('users'));
    }

    public function userUpdate(Request $request, User $users, $id)
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
        return redirect()->route('userlist');
    }

    public function userDestroy(Request $request, User $user, $id)
    {
        $users = $user->find($id);

        $users->delete();

        return redirect()->route('userlist');
    }
}
