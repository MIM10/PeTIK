@extends('adminlte::page')
@section('title', 'Edit Populer')
@section('content_header')
    <h1>Edit Data Populer</h1>
@stop
@section('content')
    <a class="btn btn-secondary btn-md" href="{{ '/populer' }}" role="button">Back</a><br /><br />
    {{-- Ini Konten Form Edit populer --}}
    {{-- Panggil master data populer, penerbit dan kategori untuk ditampilkan di element form edit populer --}}
    @php
        $rs1 = App\Models\Carousel::all();
    @endphp
    @foreach ($data as $rs)
        <form method="POST" enctype="multipart/form-data" action="{{ route('populer.update', $rs->id) }}">
    @endforeach
    @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
    @method('put') {{-- method put digunakan untuk meletakkan data yang akan diubah disetiap element form edit populer --}}
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control" />
    </div>
    <div class="form-group">
        <label>Kegunaan</label>
        <input type="text" name="kegunaan" value="{{ $rs->kegunaan }}" class="form-control" />
    </div>
    <div class="form-group">
        <label>Harga</label>
        <input type="text" name="harga" value="{{ $rs->harga }}" class="form-control" />
    </div>
    <div class="form-group">
        <label>Stok</label>
        <input type="text" name="stok" value="{{ $rs->stok }}" class="form-control" />
    </div>
    <div class="form-group">
        <label>ID Kategori</label>
        <input type="text" name="idkategori" value="{{ $rs->idkategori }}" class="form-control" />
    </div>
    <div class="form-group">
        <label>Komposisi</label>
        <input type="text" name="komposisi" value="{{ $rs->komposisi }}" class="form-control" />
    </div>
    <div class="form-group">
        <label>Kontra Indikasi</label>
        <input type="text" name="kontra_indikasi" value="{{ $rs->kontra_indikasi }}" class="form-control" />
    </div>
    <div class="form-group">
        <label>Aturan Pakai</label>
        <input type="text" name="aturan_pakai" value="{{ $rs->aturan_pakai }}" class="form-control" />
    </div>
    <div class="form-group">
        <label>Foto</label>
        <input type="text" name="foto" value="{{ $rs->foto }}" class="form-control" />
    </div>
    <button type="submit" class="btn btn-primary" name="proses">Ubah</button>

    <button type="reset" class="btn btn-warning" name="unproses">Batal</button>

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
