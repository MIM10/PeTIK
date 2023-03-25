@extends('adminlte::page')
@section('title', 'Form Pengarang')
@section('content_header')
    <h1>Input Data Pengarang</h1><br />
    <a class="btn btn-secondary btn-md" href="{{ '/pengarang' }}" role="button">Back</a><br /><br />
    <table class="table table-striped">
    @stop
    @section('content')
        {{-- Ini Konten Form Input Pengarang --}}
        {{-- Panggil master data pengarang, penerbit dan kategori untuk
ditampilkan di element form --}}
        @php
            $rs1 = App\Models\Pengarang::all();
        @endphp
        <form method="POST" enctype="multipart/form-data" action="{{ route('pengarang.store') }}">
            @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" />
                <label class="mt-sm-3">Email</label>
                <input type="text" name="email" class="form-control" />
                <label class="mt-sm-3">Hp</label>
                <input type="text" name="hp" maxlength="12" class="form-control" />
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
