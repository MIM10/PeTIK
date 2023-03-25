@extends('adminlte::page')
@section('title', 'Form Penerbit')
@section('content_header')
    <h1>Input Data Penerbit</h1><br />
    <a class="btn btn-secondary btn-md" href="{{ '/penerbit' }}" role="button">Back</a><br /><br />
    <table class="table table-striped">
    @stop
    @section('content')
        {{-- Ini Konten Form Input Penerbit --}}
        {{-- Panggil master data Penerbit, penerbit dan kategori untuk
ditampilkan di element form --}}
        @php
            $rs1 = App\Models\Penerbit::all();
        @endphp
        <form method="POST" action="{{ route('penerbit.store') }}">
            @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" />
                <label class="mt-sm-3">Alamat</label>
                <input type="text" name="alamat" class="form-control" />
                <label class="mt-sm-3">Email</label>
                <input type="text" name="email" class="form-control" />
                <label class="mt-sm-3">Website</label>
                <input type="text" name="website" class="form-control" />
                <label class="mt-sm-3">Telepon</label>
                <input type="text" name="telepon" maxlength="12" class="form-control" />
                <label class="mt-sm-3">CP</label>
                <input type="text" name="cp" class="form-control" />
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
