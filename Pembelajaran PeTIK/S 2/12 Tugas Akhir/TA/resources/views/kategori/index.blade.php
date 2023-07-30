@extends('adminlte::page')
@section('title', 'Data Kategori')
@section('content_header')
    <h1>Data Kategori</h1>
@stop
@section('content')
    {{-- Isi Konten Data Kategori --}}
    @php
        $ar_judul = ['No', 'Nama', 'Action'];
        $no = 1;
    @endphp
    <a class="btn btn-primary btn-md" href="{{ route('kategori.create') }}" role="button">Tambah Kategori</a>

    <br /><br />

    <form action="{{ route('kategori.index') }}">
        <div class="input-group">
            <input name="keyword" type="text" value="{{ Request::get('keyword') }}" class="form-control">
            <div class="input-group-append">
                <input type="submit" value="Filter" class="btn btn-primary">
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                @foreach ($ar_judul as $jdl)
                    <th>{{ $jdl }}</th>
                @endforeach
            </tr>
        </thead>
        {{-- Lanjutan Isi Konten Data Kategori --}}
        <tbody>
            @foreach ($ar_kategori as $b)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $b->nama }}</td>
                    <td>
                        <form action="{{ route('kategori.destroy', $b->id) }}" method="POST">
                            @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
                            @method('delete') {{-- method delete digunakan untuk menghapus data --}}
                            <a class="btn btn-info" href="{{ route('kategori.show', $b->id) }}">Detail</a>
                            <a class="btn btn-success" href="{{ route('kategori.edit', $b->id) }}">Edit</a>
                            <button class="btn btn-danger"
                                onclick="return confirm('Anda Yakin Data di Hapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script>
        console.log('Hi!');
    </script>
