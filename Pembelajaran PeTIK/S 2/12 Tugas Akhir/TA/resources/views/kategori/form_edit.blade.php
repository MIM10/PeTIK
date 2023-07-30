@extends('adminlte::page')
@section('title', 'Edit Kategori')
@section('content_header')
    <h1>Edit Data Kategori</h1>
@stop
@section('content')
    <a class="btn btn-secondary btn-md" href="{{ '/kategori' }}" role="button">Back</a><br /><br />
    {{-- Ini Konten Form Edit Kategori --}}
    {{-- Panggil master data Kategori, penerbit dan kategori untuk ditampilkan di element form edit Kategori --}}
    @php
        $rs1 = App\Models\Kategori::all();
    @endphp
    @foreach ($data as $rs)
        <form method="POST" action="{{ route('kategori.update', $rs->id) }}">
    @endforeach
    @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
    @method('put') {{-- method put digunakan untuk meletakkan data yang akan diubah disetiap element form edit Kategori --}}
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control" />
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
