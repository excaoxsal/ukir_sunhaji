@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right">
        
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            
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
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <form action="{{route('delete',$role->id)}}" method="POST">@csrf
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                
                    <input type="hidden" value="{{$role->id}}" name="id">
                    <button class="btn btn-danger"> Delete</button>
                    
                    <button type="submit" class="btn btn-danger"> asw
                    </button>        
        </td>
        </form>
    </tr>
    @endforeach
</table>




@endsection