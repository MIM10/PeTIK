@extends('adminlte::page')
@section('title', 'Data Populer')
@section('content_header')
    <h1>Data Populer</h1>
@stop
@section('content')
    {{-- Isi Konten Data Populer --}}
    @php
        $ar_judul = ['No', 'Nama', 'Harga', 'Stok', 'Kategori', 'Action'];
        $no = 1;
    @endphp
    <a class="btn btn-primary btn-md" href="{{ route('populer.create') }}" role="button">Tambah Populer</a>
    <br /><br />

    <form action="{{ route('populer.index') }}">
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
        {{-- Lanjutan Isi Konten Data carousel --}}
        <tbody>
            @foreach ($ar_carousel as $i)
                <tr class="">
                    <td>{{ $no++ }}</td>
                    <td>{{ $i->nama }}</td>
                    <td>{{ $i->harga }}</td>
                    <td>{{ $i->stok }}</td>
                    <td>{{ $i->kategori }}</td>
                    <td>
                        <form action="{{ route('populer.destroy', $i->id) }}" method="POST">
                            @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
                            @method('delete') {{-- method delete digunakan untuk menghapus data --}}
                            <a class="btn btn-info" href="{{ route('populer.show', $i->id) }}"><i class="fas fa-fw fa-eye"></i></a>
                            <a class="btn btn-success" href="{{ route('populer.edit', $i->id) }}"><i class="fas fa-fw fa-pen"></i></a>
                            <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data di Hapus?')"><i class="fas fa-fw fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $ar_carousel->links() }}
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script>
        console.log('Hi!');
    </script>
