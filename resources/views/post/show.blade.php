@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="{{ route('post.index') }}" class="btn btn-outline-primary btn-sm">Go back</a>
                <h1 class="display-one" style="color:cadetblue">{{ ucfirst($post->title) }}</h1>
                <p> Created at: {{$post->created_at}}   
                    Updated at: {{$post->updated_at}} </p>
                <p>{!! $post->description !!}</p> 
                <hr>
                <a href="{{ route('post.edit', $post->id)}}" class="btn btn-outline-primary">Edit Post</a>
                <br><br>
                {{-- {!! dd($post->id) !!} --}}
                <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection




