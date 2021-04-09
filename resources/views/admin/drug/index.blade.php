@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Daftar Obat') }}</div>

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
                        <form action="{{ route('drug.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nama Obat</label>
                                            <input type="text" name="name" id="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bentuk">Bentuk</label>
                                            <input type="text" name="bentuk" id="bentuk" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="stock">Stok</label>
                                            <input type="number" name="stock" id="stock" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Harga/Obat</label>
                                            <input type="number" name="price" id="price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="supplies_id">Pemasok</label>
                                            <select class="custom-select" name="supplies_id" id="supplies_id">
                                                <option disabled selected>Pilih Pemasok</option>
                                                @foreach ($supplies as $supply)
                                                    <option value="{{ $supply->id }}">{{ $supply->name }}</option>
                                                @endforeach
                                              </select>
                                        </div>  
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="consumed_by">Dikonsumsi Oleh</label>
                                            <input type="text" name="consumed_by" id="consumed_by" class="form-control">
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
                                    <th>Nama Obat</th>
                                    <th>Bentuk</th>
                                    <th>Dikonsumsi Oleh</th>
                                    <th>Nama Pemasok</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($drugs as $drug)
                                    <tr>
                                        <td>{{ $no++ . '.' }}</td>
                                        <td>{{ $drug->name }}</td>
                                        <td>{{ $drug->bentuk }}</td>
                                        <td>{{ $drug->consumed_by }}</td>
                                        <td>{{ $drug->supply->name }}</td>
                                        <td>{{ $drug->stock }}</td>
                                        <td>{{ "Rp. " . number_format($drug->price, 0,',','.') }}</td>
                                        <td>
                                            <a href="{{ route('drug.edit', $drug->id) }}" class="btn btn-sm btn-warning mr-1 mb-1" style="float: left;">Edit</a>
                                            <button type="submit" onclick="deleteDrug('{{ $drug->id }}')" class="btn btn-sm btn-danger">Hapus</button>
                                            <form action="{{ route('drug.destroy', $drug->id) }}" method="post" id="DeleteDrug{{ $drug->id }}">
                                                @csrf
                                                @method('delete')
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
@push('script')
    <script>
        function deleteDrug(id) {
        Swal.fire({
            title: 'Apa Anda Yakin?',
            text: "Anda tidak dapat mengembalikannya!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Menghapus obat",
                        showConfirmButton: false,
                        timer: 2300,
                        timerProgressBar: true,
                        onOpen: () => {
                            document.getElementById(`DeleteDrug${id}`).submit();
                            Swal.showLoading();
                        }
                    });
                }
        })
    }
    </script>
@endpush