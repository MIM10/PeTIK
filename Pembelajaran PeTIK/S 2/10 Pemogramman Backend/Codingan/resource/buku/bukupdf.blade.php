@php
    $no = 1;
    $ar_judul = ['No', 'ISBN', 'Judul', 'Pengarang', 'Penerbit', 'Kategori'];
@endphp
<h3 align="center">Daftar Buku</h3>
<table border="1" width="100%" cellspacing="0" align="center">
    <thead>
        <tr bgcolor="pink">
            @foreach ($ar_judul as $jdl)
                <th>{{ $jdl }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($ar_buku as $buku)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $buku->isbn }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->nama }}</td>
                <td>{{ $buku->penerbit }}</td>
                <td>{{ $buku->kategori }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
