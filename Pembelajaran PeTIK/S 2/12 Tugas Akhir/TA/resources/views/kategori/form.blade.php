@extends('adminlte::page')
@section('title', 'Form Kategori')
@section('content_header')
    <h1>Input Data Kategori</h1><br />
    <a class="btn btn-secondary btn-md" href="{{ '/kategori' }}" role="button">Back</a><br /><br />
    <table class="table table-striped">
    @stop
    @section('content')
        {{-- Ini Konten Form Input Kategori --}}
        {{-- Panggil master data Kategori, penerbit dan kategori untuk
ditampilkan di element form --}}
        @php
            $rs1 = App\Models\Kategori::all();
        @endphp
        <form method="POST" enctype="multipart/form-data" action="{{ route('kategori.store') }}">
            @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" />
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
