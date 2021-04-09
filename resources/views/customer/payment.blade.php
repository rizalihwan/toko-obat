@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Beli Obat') }}</div>

                <div class="card-body">
                    <div class="card">
                        <form action="{{ route('customer.pay', $drug->id) }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" name="stock" value="{{ $drug->stock }}" id="stock">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nama Obat</label>
                                            <input type="text" name="name" value="{{ $drug->name }}" readonly id="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bentuk">Bentuk</label>
                                            <input type="text" name="bentuk" value="{{ $drug->bentuk }}" readonly id="bentuk" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">    
                                            <label for="price">Harga/Obat</label>
                                            <input type="number" name="price" value="{{ $drug->price }}" readonly id="price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="consumed_by">Dikonsumsi Oleh</label>
                                            <input type="text" name="consumed_by" value="{{ $drug->consumed_by }}" readonly id="consumed_by" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah Pembelian</label>
                                            <input type="number" id="jumlah" name="jumlah" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jumlah_bayar">Jumlah Bayar</label>
                                            <input type="number" id="jumlah_bayar" readonly class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('customer.buy') }}" class="btn btn-danger">Kembali</a>
                                <button type="submit" id="bayar" class="btn btn-success">Bayar</button>
                                <span style="color: red;" id="pesan_kelebihan"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    let harga = document.getElementById('price');
    let jumlah = document.querySelector('#jumlah');    
    let btn = document.getElementById('bayar');
    window.onload = function() {
        btn.hidden = true;
    }
    function hiddenBayarBtn()
    {
        btn.hidden = true;
    }
    function showBayarBtn()
    {
        btn.hidden = false;
    }
    jumlah.addEventListener('keyup', function(){
        document.getElementById('jumlah_bayar').value = parseInt(harga.value) * parseInt(jumlah.value);
        const stock = document.querySelector('#stock');
        let pesan_kelebihan = document.getElementById('pesan_kelebihan');
        if (parseInt(jumlah.value) < 0 || jumlah.value == 0) {
            hiddenBayarBtn();
        } else {
            showBayarBtn();
            if(parseInt(jumlah.value) > parseInt(stock.value))  
            {
                hiddenBayarBtn();
                pesan_kelebihan.innerHTML = "Jumlah Melebihi Stok!";
                pesan_kelebihan.className = "ml-2";
                Swal.fire({
                    icon: 'error',
                    title: 'Informasi Pesan',
                    text: 'Jumlah Melebihi Stok!'
                });
            } else {
                showBayarBtn();
                pesan_kelebihan.innerHTML = null;
            }
        }
    });
</script>
@endpush