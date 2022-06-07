@extends('layouts.adminLayout')

@section('content')
    <form action="{{ route('userstore') }}" method="POST">
        @csrf
        @method('POST')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <a href="{{ route('userlist') }}" class="btn btn-outline-primary btn-sm"> <i class="fas fa-backward "></i> </a>

                    <div class="card center">
                        <div class="card-header red">
                            <h2>{{ __('Add New User') }}</h2>
                        </div>
                       
                        <div class="card-body">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name"
                                value=""><br>

                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email"
                                value=""><br>
                          
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password"
                                value=""><br><br>

                            <button type="submit" class="btn btn-primary" id="addBlog" name="adduser"
                                value="">Submit</button>
                            <button type="reset" class="btn btn-primary">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection()