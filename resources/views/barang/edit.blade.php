@extends('layouts.master')

@section('content')
        <h2>EDIT DATA BARANG</h2>
            <!-- ALERT NOTIFIKASI KEBERHASILAN SUBMISSION -->
            @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                {{session('sukses')}}
                </div>
            @endif
            <div class="row">
                <form action="/barang/{{$barang->id}}/update" method="POST" enctype="multipart/form-data">
                 {{csrf_field()}}
                <div class="mb-3">
                <div class="form-group">
                    <label for="InputkodeBarang" class="form-label">Kode Barang</label>
                    <input name="kode_barang" type="text" class="form-control" placeholder="Masukkan Kode Barang" value="{{$barang->kode_barang}}">
                </div>
                </div>
                <div class="mb-3">
                <div class="form-group">
                    <label for="InputNamaBarang" class="form-label">Nama Barang</label>
                    <input name="nama_barang" type="text" class="form-control" placeholder="Masukkan Nama Barang" value="{{$barang->nama_barang}}">
                </div>
                </div>
                <div class="mb 3">
                <div class="form-group{{$errors->has('ukuran') ? ' has-error' : ''}}">
                    <label for="InputUkuran" class="form-label">Ukuran</label>
                    <select name="ukuran" class="form-control" aria-label="Default select example">
                        <option selected>Masukkan Pilihan</option>
                        <option value="S" @if($barang->ukuran == 'S') selected  @endif>S</option>
                        <option value="M" @if($barang->ukuran == 'M') selected  @endif>M</option>
                        <option value="L" @if($barang->ukuran == 'L') selected  @endif>L</option>
                        <option value="XL" @if($barang->ukuran == 'XL') selected  @endif>XL</option>
                        <option value="XXL" @if($barang->ukuran == 'XXL') selected  @endif>XXL</option>
                    </select>
                    @if($errors->has('ukuran'))
                    <span class="help-block">{{$errors->first('ukuran')}}</span>
                    @endif
                </div>
                </div>
                <br>
                <div class="mb 3">
                <div class="form-group{{$errors->has('warna') ? ' has-error' : ''}}">
                    <label for="InputWarna" class="form-label">Warna</label>
                    <select name="warna" class="form-control" aria-label="Default select example">
                        <option selected>Masukkan Pilihan</option>
                        <option value="Hitam" @if($barang->warna == 'Hitam') selected  @endif>Hitam</option>
                        <option value="Putih" @if($barang->warna == 'Putih') selected  @endif>Putih</option>
                        <option value="Biru" @if($barang->warna == 'Biru') selected  @endif>Biru</option>
                        <option value="Merah" @if($barang->warna == 'Merah') selected  @endif>Merah</option>
                        <option value="Hijau" @if($barang->warna == 'Hijau') selected  @endif>Hijau</option>
                    </select>
                    @if($errors->has('warna'))
                    <span class="help-block">{{$errors->first('warna')}}</span>
                    @endif
                </div>
                </div>
                <br>
                <div class="mb-3">
                <div class="form-group">
                    <label for="InputMerek" class="form-label">Merek</label>
                    <input name="merek" type="text" class="form-control" placeholder="Masukkan Merek" value="{{$barang->merek}}">
                </div>
                </div>
                <div class="mb-3">
                <div class="form-group">
                    <label for="InputJenisBarang" class="form-label">Jenis Barang</label>
                    <input name="jenis_barang" type="text" class="form-control" placeholder="Masukkan Jenis Barang" value="{{$barang->jenis_barang}}">
                </div>
                </div>
                <div class="mb-3">
                <div class="form-group">
                    <label for="InputStok" class="form-label">Stok</label>
                    <input name="stok" type="number" class="form-control" placeholder="Masukkan Jumlah Stok" value="{{$barang->stok}}">
                </div>
                </div>
                <div class="mb-3">
                <div class="form-group">
                    <label for="InputHargaBeli" class="form-label">Harga Beli</label>
                    <input name="harga_beli" type="number" class="form-control" placeholder="Masukkan Harga Beli" value="{{$barang->harga_beli}}">
                </div>
                </div>
                <div class="mb-3">
                <div class="form-group">
                    <label for="InputHargaJual" class="form-label">Harga Jual</label>
                    <input name="harga_jual" type="number" class="form-control" placeholder="Masukkan Harga Jual" value="{{$barang->harga_jual}}">
                </div>
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
            </form>
            </div>
@stop