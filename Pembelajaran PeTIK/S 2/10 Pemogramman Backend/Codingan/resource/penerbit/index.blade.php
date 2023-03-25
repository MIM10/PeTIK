@extends('adminlte::page')
@section('title', 'Data Penerbit')
@section('content_header')
    <h1>Data Penerbit</h1>
@stop
@section('content')
    {{-- Isi Konten Data Penerbit --}}
    @php
        $ar_judul = ['No', 'Nama', 'Alamat', 'Email', 'Website', 'Telepon', 'CP', 'Action'];
        $no = 1;
    @endphp
    <a class="btn btn-primary btn-md" href="{{ route('penerbit.create') }}" role="button">Tambah Penerbit</a>
    <br /><br />

    <form action="{{ route('penerbit.index') }}">
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
        {{-- Lanjutan Isi Konten Data Penerbit --}}
        <tbody>
            @foreach ($ar_penerbit as $peng)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $peng->nama }}</td>
                    <td>{{ $peng->alamat }}</td>
                    <td>{{ $peng->email }}</td>
                    <td>{{ $peng->website }}</td>
                    <td>{{ $peng->telp }}</td>
                    <td>{{ $peng->cp }}</td>
                    <td>
                        <form action="{{ route('penerbit.destroy', $peng->id) }}" method="POST">
                            @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
                            @method('delete') {{-- method delete digunakan untuk menghapus data --}}
                            <a class="btn btn-info" href="{{ route('penerbit.show', $peng->id) }}">Detail</a>
                            <a class="btn btn-success" href="{{ route('penerbit.edit', $peng->id) }}">Edit</a>
                            <button class="btn btn-danger"
                                onclick="return confirm('Anda Yakin Data di Hapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $ar_penerbit->links() }}
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script>
        console.log('Hi!');
    </script>
