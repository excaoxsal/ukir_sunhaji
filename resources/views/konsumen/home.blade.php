@extends('layouts.konsumen')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <a href="{{ route('alamat.create') }}" >test alamat</a><br>
                    <a href="{{ route('alamat.index') }}" >test index alamat</a><br>
                    <a href="{{ route('shipping') }}" >test shiping</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
