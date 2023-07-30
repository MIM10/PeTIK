@extends('adminlte::page')  
@section('title', 'Detail Kategori')  
@section('content_header')
    <h1>Detail Kategori</h1>  
@stop  
@section('content')
{{-- Ini Konten Detail Data Kategori --}}  
@foreach($ar_kategori as $b)
    <div class="media">
        @php
            if(!empty($b->foto)){
            @endphp
                <img src="{{ asset($b->foto) }}" alt="{{ $b->foto }}" width="10%" class="mr-3">
            @php    
            }
        @endphp
        <div class="media-body">
            <h3><u>{{ $b->nama }}</u></h3>
            <p>
                Nama : {{ $b->nama }}<br/>
            </p>
            <hr/><a href="{{ url('/kategori') }}" class="btn btn-info">Go Back</a>
            <a class="btn btn-success" href="{{ route('kategori.edit', $b->id) }}">Edit</a>
            <button class="btn btn-danger" onlick="return confirm('Anda Yakin Data Dihapus')">Delete</button>
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