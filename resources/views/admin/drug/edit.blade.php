@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Daftar Obat') }}</div>

                <div class="card-body">
                    <div class="card mb-5">
                        <form action="{{ route('drug.update', $drug->id) }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" name="name" value="{{ $drug->name }}" id="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bentuk">Bentuk</label>
                                            <input type="text" name="bentuk" value="{{ $drug->bentuk }}" id="bentuk" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="stock">Stok</label>
                                            <input type="number" name="stock" value="{{ $drug->stock }}" id="stock" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Harga/Obat</label>
                                            <input type="number" name="price" value="{{ $drug->price }}" id="price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="supplies_id">Pemasok</label>
                                            <select class="custom-select" name="supplies_id" id="supplies_id">
                                                @foreach ($supplies as $supply)
                                                    <option {{ $supply->id == $drug->supplies_id ? 'selected' : '' }} value="{{ $supply->id }}">{{ $supply->name }}</option>
                                                @endforeach
                                              </select>
                                        </div>  
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="consumed_by">Dikonsumsi Oleh</label>
                                            <input type="text" name="consumed_by" value="{{ $drug->consumed_by }}" id="consumed_by" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('drug.index') }}" class="btn btn-danger">Kembali</a>
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