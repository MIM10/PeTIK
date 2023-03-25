@extends('adminlte::page')
@section('title', 'Data Buku')
@section('content_header')
    <h1>Data Buku</h1>
@stop
@section('content')
    {{-- Isi Konten Data Buku --}}
    @php
        $ar_judul = ['No', 'ISBN', 'Judul', 'Stok', 'Pengarang', 'Penerbit', 'Kategori', 'Action'];
        $no = 1;
    @endphp
    <a class="btn btn-primary btn-md" href="{{ route('buku.create') }}" role="button">Tambah Buku</a>
    <a href="{{ url('bukupdf') }}" class="btn btn-info"><i class="fas fa-file-pdf py-1"></i> </a>
    <a href="{{ url('bukucsv') }}" class="btn btn-warning" role="button"><i class="fas fa-file-csv py-1"></i></a>

    <br /><br />
    <form action="{{ route('buku.index') }}">
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
        {{-- Lanjutan Isi Konten Data Buku --}}
        <tbody>
            @foreach ($ar_buku as $b)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $b->isbn }}</td>
                    <td>{{ $b->judul }}</td>
                    <td>{{ $b->stok }}</td>
                    <td>{{ $b->pengarang }}</td>
                    <td>{{ $b->penerbit }}</td>
                    <td>{{ $b->kategori }}</td>
                    <td>
                        <form action="{{ route('buku.destroy', $b->id) }}" method="POST">
                            @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
                            @method('delete') {{-- method delete digunakan untuk menghapus data --}}
                            <a class="btn btn-info" href="{{ route('buku.show', $b->id) }}">Detail</a>
                            <a class="btn btn-success" href="{{ route('buku.edit', $b->id) }}">Edit</a>
                            <button class="btn btn-danger"
                                onclick="return confirm('Anda Yakin Data Dihapus')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $ar_buku->links() }}
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script>
        console.log('Hi!');
    </script>
