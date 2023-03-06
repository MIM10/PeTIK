<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border cellpadding="5">
        <h3>Data Mahasiswa</h3>
        <thead>
            <tr>
                @foreach($judul as $jdl)
                    <th>{{ $jdl }}</th>
                @endforeach
            </tr>
        </thead>

        <tbody>
            @foreach($siswa as $sis)
            {{-- logic kelulusan dan warna-warni dgn ternary --}}
            <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $sis['nama'] }}</td>
                <td>{{ $sis['alamat'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>