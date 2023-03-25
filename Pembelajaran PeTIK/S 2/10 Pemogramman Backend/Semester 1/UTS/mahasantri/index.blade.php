@extends('adminlte::page')
@section('title','Data Mahasantri
')
@section('content_header')
    <h1>Data Mahasantri

    </h1>
@stop
@section('content') 
{{-- Isi Konten Data Mahasantri --}}
@php
$ar_judul = ['No','NIM','Nama','Jurusan','Alamat','Kota','Provinsi','Email'];
$no = 1;
@endphp
<a class="btn btn-primary btn-md"
href="{{ route('mahasantri.create') }}" role="button">Tambah Mahasantri
</a><br/><br/>
<table class="table table-striped">    
    <thead>
        <tr>
            @foreach($ar_judul as $jdl)
                <th>{{ $jdl }}</th>
            @endforeach
        </tr>
    </thead>
    {{-- Lanjutan Isi Konten Data Mahasantri --}}
    <tbody>
        @foreach($ar_mahasantri as $peg)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $peg->nim }}</td>
                <td>{{ $peg->nama }}</td>
                <td>{{ $peg->jurusan }}</td>
                <td>{{ $peg->alamat }}</td>
                <td>{{ $peg->kota }}</td>
                <td>{{ $peg->provinsi }}</td>
                <td>{{ $peg->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>