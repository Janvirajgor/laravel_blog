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
                    <a href="{{ route('userlist') }}" class="btn btn-outline-primary btn-sm"> <i class="fas fa-backward "></i> </a>
                    <div class="card" style="text-align: center">
                        <div class="card-header red">
                            {{ __('User Name ') }}
                        </div>
                        <div class="card-body">
                            {{ $user->name }}
                        </div>
                        <div class="card-header red">
                            {{ __('User Email Address') }}
                        </div>
                        <div class="card-body">
                            {{ $user->email }}
                        </div>
                        
                        <div>
                            <form action="{{ route('userdestroy', $user->id) }}" method="POST">
                                <a href="{{ route('useredit', $user->id) }}" class="btn btn-success">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection()