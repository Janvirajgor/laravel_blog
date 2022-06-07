@extends('layouts.adminLayout')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <a href="{{ route('bloglist') }}" class="btn btn-outline-primary btn-sm"> <i class="fas fa-backward "></i> </a>
                    <div class="card" style="text-align: center">
                        <div class="card-header red">
                            {{ __('Blog Name ') }}
                        </div>
                        <div class="card-body">
                            {{ $blogs->title }}
                        </div>
                        <div class="card-header red">
                            {{ __('Blog Type') }}
                        </div>
                        <div class="card-body">
                            {{ $blogs->type }}
                        </div>
                        <div class="card-header red">
                            {{ __('Blog Description') }}
                        </div>
                        <div class="card-body">
                            {{ $blogs->description }}
                        </div>
                        <div class="card-header red">
                            {{ __('Blog Picture') }}
                        </div>
                        <div class="card-body">
                            <img src="{{ asset($blogs->image) }}" alt="img" width="250px" height="300px">
                        </div>
                        
                        <div>
                            <form action="{{ route('blogdestroy', $blogs->id) }}" method="POST">
                                <a href="{{ route('blogedit', $blogs->id) }}" class="btn btn-primary">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"  onclick="return confirm('Are you sure to delete')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection()