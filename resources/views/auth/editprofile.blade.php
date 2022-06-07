@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{  route('profile', $user->id) }}" class="btn btn-outline-primary btn-sm"> <i class="fas fa-backward "></i> </a>
                <div class="card">
                    <div class="card-header red center">
                        <h2>{{ __('Update Profile') }}</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update',$user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                            <div class="form-group">
                                Name :
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Enter Name" value="{{ $user->name }}" required> <br>
                            </div>
                            <div class="form-group">
                                Email : <br>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email Address"
                                    value="{{ $user->email }}" required> <br>
                            </div>

                            <div class="center">   
                                <button type="submit" class="btn btn-primary" id="updateprofile" name="updateprofile"
                                    value="">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()