@extends('adminlte::page')
@section('title', 'Edit Penerbit')
@section('content_header')
    <h1>Edit Data Penerbit</h1>
@stop
@section('content')
    <a class="btn btn-secondary btn-md" href="{{ '/penerbit' }}" role="button">Back</a><br /><br />
    {{-- Ini Konten Form Edit Penerbit --}}
    {{-- Panggil master data Penerbit, penerbit dan kategori untuk ditampilkan di element form edit Penerbit --}}
    @php
        $rs1 = App\Models\Penerbit::all();
    @endphp
    @foreach ($data as $rs)
        <form method="POST" action="{{ route('penerbit.update', $rs->id) }}">
    @endforeach
    @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
    @method('put') {{-- method put digunakan untuk meletakkan data yang akan diubah disetiap element form edit Penerbit --}}
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control" />
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" value="{{ $rs->alamat }}" class="form-control" />
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" value="{{ $rs->email }}" class="form-control" />
    </div>
    <div class="form-group">
        <label>Website</label>
        <input type="text" name="website" value="{{ $rs->website }}" class="form-control" />
    </div>
    <div class="form-group">
        <label>Telepon</label>
        <input type="text" name="telp" maxlength="12" value="{{ $rs->telp }}" class="form-control" />
    </div>
    <div class="form-group">
        <label>CP</label>
        <input type="text" name="cp" value="{{ $rs->cp }}" class="form-control" />
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
