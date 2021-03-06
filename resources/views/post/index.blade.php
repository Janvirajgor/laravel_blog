@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">  
                    <div class=" col-12 d-flex justify-content-sm-end">
                        <form action="{{ route('post.index') }}" method="GET" role="search">
                            <div class="input-group">
                                <span class="input-group-btn mr-5 mt-1">
                                    <button class="btn btn-info" type="submit" title="Search projects">
                                        <span class="fas fa-search"></span>
                                    </button>
                                </span>
                                <input type="text" class="form-control mr-2" name="term" placeholder="Search Posts" id="term">
                                <a href="{{ route('post.index') }}" class=" mt-1">
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger" type="button" title="Refresh page">
                                            <span class="fas fa-sync-alt"></span>
                                        </button>
                                    </span>
                                </a>
                            </div>
                        </form>
                    </div>
                    <br><br>
                    <div class="col-8">
                        <a href="{{ url('/')}}" class="btn btn-outline-primary btn-sm"> <i class="fas fa-backward "></i> </a>
                        <h1 class="display-one">Our Blog!</h1>
                        <p>Enjoy reading our posts. Click on a post to read!</p>
                    </div>
                  
                    <div class="col-4">
                        @if(auth()->user())
                            <p>Create new Post</p>
                            <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm">Add Post</a>
                        @endif
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
                            <img src="{{ asset($post->image) }}" style="height: 150px; width:250px;" alt="{{ $post->title }} photo" class="img-fluid">
                        @endif
                       
                        <h1 class="display-one">
                            <a class="showdata" style="text-decoration: none; color:cadetblue" href="{{ route('post.show', $post->id)}}"> {{ ucfirst($post->title) }} </a>
                        </h1>
                 
                        @if($post->created_at == NULL)
                            <span class="text-danger">No Date Set</span>
                         @else
                            Created at:
                                {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                <br> Updated at:
                                {{ Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}
                        @endif
                        <h5> {!! $post->description !!} </h5>
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