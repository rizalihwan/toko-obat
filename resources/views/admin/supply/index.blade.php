@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Daftar Pemasok') }}</div>

                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card mb-5">
                        <form action="{{ route('supply.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
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
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                    <h3 class="text-secondary"><u>Tabel Obat</u></h3>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pemasok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($supplies as $supply)
                                    <tr>
                                        <td>{{ $no++ . '.' }}</td>
                                        <td>{{ $supply->name }}</td>
                                        <td>
                                            <a href="{{ route('supply.edit', $supply->id) }}" class="btn btn-sm btn-warning mr-1" style="float: left;">Edit</a>
                                            <form action="{{ route('supply.destroy', $supply->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Anda yakin ingin menghapus data?');" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection