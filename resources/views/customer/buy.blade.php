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
                                            <a href="{{ route('customer.payment', $drug->id) }}" class="btn btn-success">Beli</a>
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
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@endpush