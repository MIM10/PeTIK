@extends('adminlte::page')
@section('title', 'Edit Pengarang')
@section('content_header')
    <h1>Edit Data Pengarang</h1>
@stop
@section('content')
    <a class="btn btn-secondary btn-md" href="{{ '/pengarang' }}" role="button">Back</a><br /><br />
    {{-- Ini Konten Form Edit Pengarang --}}
    {{-- Panggil master data pengarang, penerbit dan kategori untuk ditampilkan di element form edit pengarang --}}
    @php
        $rs1 = App\Models\Pengarang::all();
    @endphp
    @foreach ($data as $rs)
        <form method="POST" action="{{ route('pengarang.update', $rs->id) }}">
    @endforeach
    @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
    @method('put') {{-- method put digunakan untuk meletakkan data yang akan diubah disetiap element form edit pengarang --}}
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control" />
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" value="{{ $rs->email }}" class="form-control" />
    </div>
    <div class="form-group">
        <label>Hp</label>
        <input type="text" name="hp" maxlength="12" value="{{ $rs->hp }}" class="form-control" />
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
