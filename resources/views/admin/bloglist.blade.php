@extends('layouts.adminLayout')

@section('content')
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <title>Blog List</title>
    </head>
    <body>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary btn-sm"> <i class="fas fa-backward "></i> </a>

        <div class=" col-12 d-flex justify-content-sm-end">
            <form action="{{ route('bloglist') }}" method="GET" role="search">
                <div class="input-group">
                    <span class="input-group-btn mr-5 mt-1">
                        <button class="btn btn-info" type="submit" title="Search projects">
                            <span class="fas fa-search"></span>
                        </button>
                    </span>
                    <input type="text" class="form-control mr-2" name="search" placeholder="Search Posts" id="search">
                    <a href="{{ route('bloglist') }}" class=" mt-1">
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="button" title="Refresh page">
                                <span class="fas fa-sync-alt"></span>
                            </button>
                        </span>
                    </a>
                </div>
            </form>
        </div>
        <br>

        <a class="btn btn-success" href="{{ route('blogcreate') }}" id="createBlog" style="float: right;">AddBlog</a>

        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th width="5%">Id</th>
                    <th width="15%">Title</th>
                    <th width="35%">Description</th>
                    <th width="15%">Picture</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($posts as $blog)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{ $blog['title'] }}</td>
                    <td class="blog-text">
                        <a href="{{ route('showblog', $blog['id']) }}" id="description">
                            <p>{{ $blog['description'] }}</p>
                        </a>
                        <a href="{{ route('showblog', $blog['id']) }}" id="readmore">
                            <h2><span>Read more</span></h2>
                        </a>
                    </td>
                    <td><img src="{{ asset($blog['image']) }}" width="100" height="100" /></td>
                    <td>
                        <form action="{{ route('blogdestroy', $blog->id) }}" method="POST">        
                            <a href="{{ route('blogedit', $blog->id) }}" class="btn btn-primary">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"  onclick="return confirm('Are you sure to delete')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links( "pagination::bootstrap-4") }}
        <div class="w-5"></div>
    </body>
    </html>
            
@endsection()