<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\LikeDislike;
use Illuminate\Support\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $post = Post::query();
        if (request('term')) {
            $post->where('title', 'Like', '%' . request('term') . '%');
        }

        $data = $post->orderBy('id', 'DESC')->paginate(3);

        return view('post.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
                // 'post_image' => 'required|mimes:jpg.jpeg.png',
            ],
            [
                'title.required' => 'Please Enter Post title',
                'description.required' => 'Please Enter Post description',
                // 'post_image.required' => 'please select any image'
            ]
        );
        $userID = auth()->user()->id;

        $post_image = $request->file('post_image');

        //generate unique id for image
        $name_gen = hexdec(uniqid());

        //image extention
        $img_ext = strtolower($post_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/post/';
        $last_img = $up_location . $img_name;
        $post_image->move($up_location, $img_name);


        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'user_id' => $userID,
            'created_at' => Carbon::now()
        ]);


        return redirect()->route('post.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
            ],
            [
                'title.required' => 'Please Enter Post title',
                'description.required' => 'Please Enter Post description',
            ]
        );

        $old_image = $request->old_image;

        $userID = auth()->user()->id;

        $post_image = $request->file('post_image');

        if ($post_image) {
            //generate unique id for image
            $name_gen = hexdec(uniqid());

            //image extention
            $img_ext = strtolower($post_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'image/post/';
            $last_img = $up_location . $img_name;
            $post_image->move($up_location, $img_name);

            unlink($old_image);

            $post->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'user_id' => $userID,
                'updated_at' => Carbon::now()
            ]);

            return redirect()->route('post.index')
                ->with('success', 'Post updated successfully');
        } else {
            $post->update([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $userID,
                'updated_at' => Carbon::now()
            ]);

            return redirect()->route('post.index')
                ->with('success', 'Post updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_image = Post::find($id);
        $old_image = $post_image->image;

        unlink($old_image);

        Post::find($id)->delete();

        return redirect()->route('post.index')
            ->with('success', 'Post deleted successfully');
    }

    // Save Like Or dislike
    function save_likedislike(Request $request)
    {
        $data = new LikeDislike;
        $data->post_id = $request->post;
        if ($request->type == 'like') {
            $data->like = 1;
        } else {
            $data->dislike = 1;
        }
        $data->save();
        return response()->json([
            'bool' => true
        ]);
    }
}
