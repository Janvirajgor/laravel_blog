@extends('layouts.adminLayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <a href="{{ route('bloglist') }}" class="btn btn-outline-primary btn-sm"> <i class="fas fa-backward "></i> </a>

                <div class="card">
                    <div class="card-header red center">
                        <h2>{{ __('Update Blog') }}</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('blogupdate', $blogs->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')
                            <input type="hidden" name="blog_id" id="blog_id" value="{{ $blogs->id }}">
                            <input type="hidden" name="old_picture" id="old_picture" value="{{ $blogs->image }}">
                            <div class="form-group">
                                Title :
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="Enter Blog Title" value="{{ $blogs->title }}" required> <br>
                            </div>

                            <div class="form-group">
                                Description : <br>
                                <textarea name="description" id="description" class="form-control" cols="60" rows="5"
                                    placeholder="Enter Blog Description">{{ $blogs->description }}</textarea> <br>
                            </div>

                                Image : <br>
                                <input type="file" name="picture" id="picture" class="form-control">
                                <img src="{{ asset($blogs->image) }}" alt="img" width="150px" height="150px"> <br><br>
                            </div>
                            <div class="center">
                                <button type="submit" class="btn btn-primary" id="addBlog" name="updateblog"
                                    value="">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()