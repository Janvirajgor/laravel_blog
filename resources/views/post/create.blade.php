@extends('layouts.app')
@section('content')
<div class=" container">
    <div class="row">
        <div class="col-12 pt-2">
            <a href="{{ route('post.index')}}" class="btn btn-outline-primary btn-sm">Go back</a>
            <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                <h1 class="display-4">Create a New Post</h1>
                <p>Fill and submit this form to create a post</p>
                <hr>
    
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title:</strong>
                                <input type="text" name="title" class="form-control" placeholder="Enter Title">
                            </div>
                            
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description:</strong>
                                <textarea class="form-control" style="height:150px" name="description" placeholder="Enter Description"></textarea>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Post Image:</strong>
                                <input type="file" name="post_image" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button type="submit" id="btn-submit" class="btn btn-primary">
                                    Create Post
                                </button>
                            </div>
                        </div>
                        
                    </div>
                
                </form>
            </div>
        </div>
    </div>
</div>
 @endsection