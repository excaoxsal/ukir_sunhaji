@extends('layouts.app')


@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Products</h2>
                            </div>
                            <div class="pull-right">
                                @can('product-create')
                                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                                @endcan
                            </div>
                        </div>
                    </div>


                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif


                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Details</th>
                                <th>Stock</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->detail }}</td>
                                <td>{{$product->stock}}</td>
                                <td>
                                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                                        @can('product-edit')
                                        <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                                        @endcan


                                        @csrf
                                        @method('DELETE')
                                        @can('product-delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {!! $products->links() !!}
@endsection