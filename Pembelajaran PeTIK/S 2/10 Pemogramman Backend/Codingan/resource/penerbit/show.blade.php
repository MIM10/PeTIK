@extends('adminlte::page')  
@section('title', 'Detail Penerbit')  
@section('content_header')
    <h1>Detail Penerbit</h1>  
@stop  
@section('content')
{{-- Ini Konten Detail Data Penerbit --}}  
@foreach($ar_penerbit as $b)
    <div class="media">
        <div class="media-body">
            <h3><u>{{ $b->nama }}</u></h3>
            <p>
                Nama : {{ $b->nama }}<br/>
                Alamat : {{ $b->alamat }}<br/>
                Email : {{ $b->email }}<br/>
                Telepon : {{ $b->telp }}<br/>
                CP : {{ $b->cp }}<br/>
            </p>
            <hr/><a href="{{ url('/penerbit') }}" class="btn btn-info">Go Back</a>
            <a class="btn btn-success" href="{{ route('penerbit.edit', $b->id) }}">Edit</a>
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