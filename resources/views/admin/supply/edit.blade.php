@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Daftar Pemasok') }}</div>

                <div class="card-body">
                    <div class="card mb-5">
                        <form action="{{ route('supply.update', $supply->id) }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $supply->name }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    <span>{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('supply.index') }}" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection