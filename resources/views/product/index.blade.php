@extends('product.layout')

@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('product.create') }}">Create new product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        
        @foreach ($data as $key=>$value)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $value->title }}</td>
                <td>{{ \Str::limit($value->description, 100) }}</td>
                <td>
                    <form action="{{ route('product.destroy', $value->id)}}" method="POST">
                        <a class="btn btn-info" href="{{ route('product.show', $value->id)}}">Show</a>
                        <a class="btn btn-primary" href="{{ route('product.edit', $value->id)}}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $data->links() }}
    <style>
        .w-5{
            display: none;
        }
    </style>
@endsection