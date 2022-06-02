@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Our Blog!</h1>
                        <p>Enjoy reading our posts. Click on a post to read!</p>
                    </div>
                    <div class="col-4">
                        <p>Create new Post</p>
                        <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm">Add Post</a>
                    </div>
                </div>  

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif 

                @forelse ($data as $post)             
                <div class="container-item">
                        @if ($post->image)
                            <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->title }} photo" class="img-fluid">
                        @endif
                       
                        <h1 class="display-one">
                            <a class="showdata" style="text-decoration: none; color:cadetblue" href="{{ route('post.show', $post->id)}}"> {{ ucfirst($post->title) }} </a>
                        </h1>
                 
                        <p> Created at: {{$post->created_at}}   
                            Updated at: {{$post->updated_at}} </p>
                        <h4> {!! $post->description !!} </h4>
                        <hr>
                   
                </div>
                @empty
                    <p class="text-warning">No blog Posts available</p>
                @endforelse
            </div>
            {{ $data->links( "pagination::bootstrap-4") }}
        </div>
    </div>
@endsection