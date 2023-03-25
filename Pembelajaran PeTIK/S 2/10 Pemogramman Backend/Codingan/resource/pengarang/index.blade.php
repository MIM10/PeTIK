@extends('adminlte::page')
@section('title', 'Data Pengarang')
@section('content_header')
    <h1>Data Pengarang</h1>
@stop
@section('content')
    {{-- Isi Konten Data Pengarang --}}
    @php
        $ar_judul = ['No', 'Nama', 'Email', 'Hp', 'Foto', 'Action'];
        $no = 1;
    @endphp
    <a class="btn btn-primary btn-md" href="{{ route('pengarang.create') }}" role="button">Tambah Pengarang</a>
    <br /><br />

    <form action="{{ route('pengarang.index') }}">
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
        {{-- Lanjutan Isi Konten Data Pengarang --}}
        <tbody>
            @foreach ($ar_pengarang as $peng)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $peng->nama }}</td>
                    <td>{{ $peng->email }}</td>
                    <td>{{ $peng->hp }}</td>
                    <td><img src="{{ $peng->foto }}" width="50px" alt=""></td>
                    <td>
                        <form action="{{ route('pengarang.destroy', $peng->id) }}" method="POST">
                            @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
                            @method('delete') {{-- method delete digunakan untuk menghapus data --}}
                            <a class="btn btn-info" href="{{ route('pengarang.show', $peng->id) }}">Detail</a>
                            <a class="btn btn-success" href="{{ route('pengarang.edit', $peng->id) }}">Edit</a>
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
