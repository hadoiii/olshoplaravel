@extends('layouts.master')

@section('content')
            <!-- ALERT NOTIFIKASI KEBERHASILAN SUBMISSION -->
            @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                {{session('sukses')}}
                </div>
            @endif
            <div class="row">
                <div class="col-6">
                    <h3>DATA BARANG</h3>
                </div>
                <div class="col-6">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#tambahBarang">
                        TAMBAH
                    </button>
                </div>
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>KODE BARANG</th>
                            <th>NAMA BARANG</th>
                            <th>UKURAN</th>
                            <th>WARNA</th>
                            <th>MEREK</th>
                            <th>JENIS BARANG</th>
                            <th>STOK</th>
                            <th>HARGA BELI</th>
                            <th>HARGA JUAL</th>
                            <th>AKSI</th>
                        </tr>
                        @foreach($data_barang as $barang)
                        <tr>
                            <td>{{$barang->kode_barang}}</td>
                            <td>{{$barang->nama_barang}}</td>
                            <td>{{$barang->ukuran}}</td>
                            <td>{{$barang->warna}}</td>
                            <td>{{$barang->merek}}</td>
                            <td>{{$barang->jenis_barang}}</td>
                            <td>{{$barang->stok}}</td>
                            <td>{{$barang->harga_beli}}</td>
                            <td>{{$barang->harga_jual}}</td>
                            <td>
                            <a href="/barang/{{$barang->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/barang/{{$barang->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin data ini mau dihapus?')">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
<!-- Modal -->
<div class="modal fade" id="tambahBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TAMBAH DATA BARANG</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/barang/create" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="mb-3">
            <div class="form-group{{$errors->has('kode_barang') ? ' has-error' : ''}}">
                <label for="InputkodeBarang" class="form-label">Kode Barang</label>
                <input name="kode_barang" type="text" class="form-control" placeholder="Masukkan Kode Barang" value="{{old('kode_barang')}}">
                @if($errors->has('kode_barang'))
                <span class="help-block">{{$errors->first('kode_barang')}}</span>
                @endif
            </div>
            </div>
            <div class="mb-3">
            <div class="form-group{{$errors->has('nama_barang') ? ' has-error' : ''}}">
                <label for="InputNamaBarang" class="form-label">Nama Barang</label>
                <input name="nama_barang" type="text" class="form-control" placeholder="Masukkan Nama Barang" value="{{old('nama_barang')}}">
                @if($errors->has('nama_barang'))
                <span class="help-block">{{$errors->first('nama_barang')}}</span>
                @endif
            </div>
            </div>
            <div class="mb 3">
            <div class="form-group{{$errors->has('ukuran') ? ' has-error' : ''}}">
                <label for="InputUkuran" class="form-label">Ukuran</label>
                <select name="ukuran" class="form-control" aria-label="Default select example">
                    <option selected>Masukkan Pilihan</option>
                    <option value="S" {{(old('ukuran') == 'S') ? ' selected' : ''}}>S</option>
                    <option value="M" {{(old('ukuran') == 'M') ? ' selected' : ''}}>M</option>
                    <option value="L" {{(old('ukuran') == 'L') ? ' selected' : ''}}>L</option>
                    <option value="XL" {{(old('ukuran') == 'XL') ? ' selected' : ''}}>XL</option>
                    <option value="XXL" {{(old('ukuran') == 'XXL') ? ' selected' : ''}}>XXL</option>
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
                    <option value="Hitam" {{(old('warna') == 'Hitam') ? ' selected' : ''}}>Hitam</option>
                    <option value="Putih" {{(old('warna') == 'Putih') ? ' selected' : ''}}>Putih</option>
                    <option value="Biru" {{(old('warna') == 'Biru') ? ' selected' : ''}}>Biru</option>
                    <option value="Merah" {{(old('warna') == 'Merah') ? ' selected' : ''}}>Merah</option>
                    <option value="Hijau" {{(old('warna') == 'Hijau') ? ' selected' : ''}}>Hijau</option>
                </select>
                @if($errors->has('warna'))
                <span class="help-block">{{$errors->first('warna')}}</span>
                @endif
            </div>
            </div>
            <br>
            <div class="mb-3">
            <div class="form-group{{$errors->has('merek') ? ' has-error' : ''}}">
                <label for="InputMerek" class="form-label">Merek</label>
                <input name="merek" type="text" class="form-control" placeholder="Masukkan Merek" value="{{old('merek')}}">
                @if($errors->has('merek'))
                <span class="help-block">{{$errors->first('merek')}}</span>
                @endif
            </div>
            </div>
            <div class="mb-3">
            <div class="form-group{{$errors->has('jenis_barang') ? ' has-error' : ''}}">
                <label for="InputJenisBarang" class="form-label">Jenis Barang</label>
                <input name="jenis_barang" type="text" class="form-control" placeholder="Masukkan Jenis Barang" value="{{old('jenis_barang')}}">
                @if($errors->has('jenis_barang'))
                <span class="help-block">{{$errors->first('jenis_barang')}}</span>
                @endif
            </div>
            </div>
            <div class="mb-3">
            <div class="form-group{{$errors->has('stok') ? ' has-error' : ''}}">
                <label for="InputStok" class="form-label">Stok</label>
                <input name="stok" type="number" class="form-control" placeholder="Masukkan Jumlah Stok" value="{{old('stok')}}">
                @if($errors->has('stok'))
                <span class="help-block">{{$errors->first('stok')}}</span>
                @endif
            </div>
            </div>
            <div class="mb-3">
            <div class="form-group{{$errors->has('harga_beli') ? ' has-error' : ''}}">
                <label for="InputHargaBeli" class="form-label">Harga Beli</label>
                <input name="harga_beli" type="number" class="form-control" placeholder="Masukkan Harga Beli" value="{{old('harga_beli')}}">
                @if($errors->has('harga_beli'))
                <span class="help-block">{{$errors->first('harga_beli')}}</span>
                @endif
            </div>
            </div>
            <div class="mb-3">
            <div class="form-group{{$errors->has('harga_jual') ? ' has-error' : ''}}">
                <label for="InputHargaJual" class="form-label">Harga Jual</label>
                <input name="harga_jual" type="number" class="form-control" placeholder="Masukkan Harga Jual" value="{{old('harga_jual')}}">
                @if($errors->has('harga_jual'))
                <span class="help-block">{{$errors->first('harga_jual')}}</span>
                @endif
            </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
@stop