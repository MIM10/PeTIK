@extends('adminlte::page')  
@section('title', 'Detail Buku')  
@section('content_header')
    <h1>Detail Buku</h1>  
@stop  
@section('content')
{{-- Ini Konten Detail Data Buku --}}  
@foreach($ar_buku as $b)
    <div class="media">
        @php
            if(!empty($b->foto)){
            @endphp
                <img src="{{ asset($b->foto) }}" alt="{{ $b->judul }}" width="50px" class="mr-3">
            @php    
            }
        @endphp
        <div class="media-body">
            <h3><u>{{ $b->judul }}</u></h3>
            <p>
                ISBN : {{ $b->isbn }}<br/>
                Tahun Cetak : {{ $b->tahun_cetak }}<br/>
                Stok : {{ $b->stok }}<br/>
                Pengarang : {{ $b->pengarang }}<br/>
                Penerbit : {{ $b->penerbit }}<br/>
                Kategori : {{ $b->kategori }}
            </p>
            <hr/><a href="{{ url('/buku') }}" class="btn btn-info">Go Back</a>
        </div>    
    </div>
@endforeach
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">  
@stop
@section('js')
    <script> console.log('Hi!'); </script>  
@stop