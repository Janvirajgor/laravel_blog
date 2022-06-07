@extends('layouts.adminLayout')

@section('content')
    <form action="{{ route('blogstore') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
            <a href="{{ route('bloglist') }}" class="btn btn-outline-primary btn-sm"> <i class="fas fa-backward "></i> </a>

                    <div class="card center">
                        <div class="card-header red">
                            <h2>{{ __('Add New Blog') }}</h2>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Blog Title"
                                value=""><br>

                            <textarea name="description" id="description" class="form-control" cols="60" rows="5"
                                placeholder="Enter Blog Description"></textarea><br>

                            <input type="file" name="image" id="image" class="form-control"><br>
                           
                            <br><br>

                            <button type="submit" class="btn btn-primary" id="addBlog" name="addBlog"
                                value="">Submit</button>
                            <button type="reset" class="btn btn-primary">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection()