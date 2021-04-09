@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(auth()->user()->role == 'admin')
                        <span class="badge badge-info p-2">
                            <h3 class="text-white">Total Customer : {{ $customer }}</h3>
                        </span>
                    @else
                        <span class="badge badge-info p-2">
                            <h3 class="text-white">Selamat Datang {{ auth()->user()->name }}</h3>   
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
