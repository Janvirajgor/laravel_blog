@extends('layouts.adminLayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('userlist') }}" class="btn btn-outline-primary btn-sm"> <i class="fas fa-backward "></i> </a>
                <div class="card">
                    <div class="card-header red center">
                        <h2>{{ __('Update Profile') }}</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('userupdate', $users->id ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="user_id" id="user_id" value="{{ $users->id }}">
                            <input type="hidden" name="old_picture" id="old_picture" value="{{ $users->picture }}">
                            <div class="form-group">
                                Name :
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name"
                                    value="{{ $users->name }}" required> <br>
                            </div>
                            <div class="form-group">
                                Email : <br>
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="Enter Email Address" value="{{ $users->email }}" required> <br>
                            </div>

                            <div class="center">
                                <a href="{{ route('userlist') }}" class="btn btn-info">Back</a>
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