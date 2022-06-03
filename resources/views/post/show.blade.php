@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="{{ route('post.index') }}" class="btn btn-outline-primary btn-sm">Go back</a>
                <hr>
                @if ($post->image)
                    <img src="{{ asset($post->image) }}" style="height: 300px; width:300px;" alt="{{ $post->title }} photo" class="img-fluid">
                @endif
                <h1 class="display-one" style="color:cadetblue">{{ ucfirst($post->title) }}</h1>
                
                @if($post->created_at == NULL)
                <span class="text-danger">No Date Set</span>
                @else
                Created at:
                {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                <br> Updated at:
                {{ Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}
                @endif

                <p>{!! $post->description !!}</p> 
                <hr>
                <a href="{{ route('post.edit', $post->id)}}" class="btn btn-outline-primary">Edit Post</a>
                <br><br>
                
                <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete')">Delete Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection




