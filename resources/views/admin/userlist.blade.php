@extends('layouts.adminLayout')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <title>User List</title>
    </head>

    <a href="{{ route('dashboard') }}" class="btn btn-outline-primary btn-sm"> <i class="fas fa-backward "></i> </a>
    <body>
        <div class=" col-12 d-flex justify-content-sm-end">
            <form action="{{ route('userlist') }}" method="GET" role="search">
                <div class="input-group">
                    <span class="input-group-btn mr-5 mt-1">
                        <button class="btn btn-info" type="submit" title="Search projects">
                            <span class="fas fa-search"></span>
                        </button>
                    </span>
                    <input type="text" class="form-control mr-2" name="search" placeholder="Search Posts" id="search">
                    <a href="{{ route('userlist') }}" class=" mt-1">
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

        <a class="btn btn-success" href="{{ route('usercreate') }}" id="createBlog" style="float: right;">AddUser</a>
        <br>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th width="5%">Id</th>
                    <th width="15%">Name</th>
                    <th width="10%">Email</th>
                    <th width="20%">Created At</th>
                    <th width="35%">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['created_at'] }}</td>
                        <td>
                            <form action="{{ route('userdestroy', $user->id) }}" method="POST">
                                <a href="{{ route('showuser', $user->id) }}" class="btn btn-info">Show</a>
                                <a href="{{ route('useredit', $user->id) }}" class="btn btn-primary">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links( "pagination::bootstrap-4") }}
        <div class="w-5"></div>
    </body>

    </html>
@endsection()