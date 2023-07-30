@extends('adminlte::page')
@section('title', 'Form Produk')
@section('content_header')
    <h1>Input Data Produk</h1><br />
    <a class="btn btn-secondary btn-md" href="{{ '/produk' }}" role="button">Back</a><br /><br />
    <table class="table table-striped">
    @stop
    @section('content')
        {{-- Ini Konten Form Input produk --}}
        {{-- Panggil master data produk, penerbit dan kategori untuk ditampilkan di element form --}}
        @php
            $rs1 = App\Models\Carousel::all();
        @endphp
        <form method="POST" enctype="multipart/form-data" action="{{ route('populer.store') }}">
            @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" />
                <label class="mt-sm-3">Deskripsi</label>
                <input type="text" name="desc" class="form-control" />
                <label class="mt-sm-3">Harga</label>
                <input type="text" name="harga" class="form-control" />
                <label class="mt-sm-3">Stok</label>
                <input type="text" name="stok" class="form-control" />
                <label class="mt-sm-3">Kategori</label>
                <input type="text" name="idkategori" class="form-control" />
                <label class="mt-sm-3">Kegunaan</label>
                <input type="text" name="kegunaan" class="form-control" />
                <label class="mt-sm-3">Komposisi</label>
                <input type="text" name="komposisi" class="form-control" />
                <label class="mt-sm-3">Kontra Indikasi</label>
                <input type="text" name="kontra_indikasi" class="form-control" />
                <label class="mt-sm-3">Aturan Pakai</label>
                <input type="text" name="aturan_pakai" class="form-control" />
                <label class="mt-sm-3">Foto</label>
                <input type="file" class="form-control p-1" name="image">
            </div>

            <button type="submit" class="btn btn-primary" name="proses">Simpan</button>

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
