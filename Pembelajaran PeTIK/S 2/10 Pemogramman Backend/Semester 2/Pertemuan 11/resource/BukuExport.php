<?php
//Pada file BukuExport.php yang berada di folder app/Exports isi fungsi collection()
namespace App\Exports;

use App\Buku;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class BukuExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        //return Buku::all();
        $ar_buku = DB::table('buku')
            ->join('pengarang', 'pengarang.id', '=', 'buku.idpengarang')
            ->join('penerbit', 'penerbit.id', '=', 'buku.idpenerbit')
            ->join('kategori', 'kategori.id', '=', 'buku.idkategori')
            ->select(
                'buku.isbn',
                'buku.judul',
                'buku.tahun_cetak',
                'buku.stok',
                'pengarang.nama',
                'penerbit.nama AS pen',
                'kategori.nama AS kat'
            )
            ->get();
        return $ar_buku;
    }

    public function headings(): array
    {
        return [
            'ISBN', 'Judul', 'Stok',
            'Pengarang', 'Penerbit', 'Kategori'
        ];
    }
}
