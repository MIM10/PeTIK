@extends('adminlte::page')
@section('title', 'Data Produk')
@section('content_header')
    <h1>Data Produk</h1>
@stop
@section('content')
    {{-- Isi Konten Data Produk --}}
    @php
        $ar_judul = ['No', 'Nama', 'Harga', 'Stok', 'Kategori', 'Action'];
        $no = 1;
    @endphp
    <a class="btn btn-primary btn-md" href="{{ route('produk.create') }}" role="button">Tambah Produk</a>
    <br /><br />

    <form action="{{ route('produk.index') }}">
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
        {{-- Lanjutan Isi Konten Data produk --}}
        <tbody>
            @foreach ($ar_produk as $i)
                <tr class="">
                    <td>{{ $no++ }}</td>
                    <td>{{ $i->nama }}</td>
                    <td>{{ $i->harga }}</td>
                    <td>{{ $i->stok }}</td>
                    <td>{{ $i->kategori }}</td>
                    <td>
                        <form action="{{ route('produk.destroy', $i->id) }}" method="POST">
                            @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
                            @method('delete') {{-- method delete digunakan untuk menghapus data --}}
                            <a class="btn btn-info" href="{{ route('produk.show', $i->id) }}"><i class="fas fa-fw fa-eye"></i></a>
                            <a class="btn btn-success" href="{{ route('produk.edit', $i->id) }}"><i class="fas fa-fw fa-pen"></i></a>
                            <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data di Hapus?')"><i class="fas fa-fw fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $ar_produk->links() }}
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script>
        console.log('Hi!');
    </script>
