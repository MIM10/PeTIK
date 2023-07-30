@extends('adminlte::page')
@section('title', 'Detail Populer')
@section('content_header')
    <h1>Detail Populer</h1>
@stop
@section('content')
    {{-- Ini Konten Detail Data Populer --}}
    @foreach ($ar_carousel as $i)
        <div class="card p-3" style="max-width: 25rem;">
            @php
                if(!empty($i->foto)){
                @endphp
                    <img src="{{ asset($i->foto) }}" alt="{{ $i->nama }}" width="" class="card-img-top mr-3 shadow-sm">
                @php    
                }
            @endphp
            <div class="card-body">
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="card-title"><strong>{{ $i->nama }}</strong></h5>
                    <h5 class="card-title">{{ $i->harga }}</h5>
                </div>
                <p class="card-text">{{ $i->kegunaan }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div>
                                <strong>Kategori</strong>
                            </div>
                            <div class="d-flex justify-content-center">
                                {{ $i->kategori }}
                            </div>
                        </div>
                        <div>
                            <div>
                                <strong>Stok</strong>
                            </div>
                            <div class="d-flex justify-content-center">
                                {{ $i->stok }}
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item"><strong>Komposisi</strong> <br> {{ $i->komposisi }}</li>
                <li class="list-group-item"><strong>Kontra Indikasi</strong> <br> {{ $i->kontra_indikasi }}</li>
                <li class="list-group-item"><strong>Aturan Pakai</strong> <br> {{ $i->aturan_pakai }}</li>
            </ul>
            <div class="card-body d-flex justify-content-center p-0 py-3">
                <form action="{{ route('populer.destroy', $i->id) }}" method="POST">
                    @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
                    @method('delete') {{-- method delete digunakan untuk menghapus data --}}
                    <a href="{{ url('/populer') }}" class="btn btn-info">
                        <i class="fas fa-fw fa-arrow-left"></i>
                    </a>
                    <a class="btn btn-success" href="{{ route('populer.edit', $i->id) }}">
                        <i class="fas fa-fw fa-pen"></i>
                    </a>
                    <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data di Hapus?')">
                        <i class="fas fa-fw fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    @endforeach
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
