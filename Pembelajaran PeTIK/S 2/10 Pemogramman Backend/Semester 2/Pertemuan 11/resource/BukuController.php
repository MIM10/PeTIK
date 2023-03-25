<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\Models\Buku;
use App\Exports\BukuExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Pagination\Paginator;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Paginator::useBootstrap();
        $keyword = $request->get('keyword');
        //join tabel dengan Query Builder Laravel
        $ar_buku = DB::table('buku')
            ->join('pengarang', 'pengarang.id', '=', 'buku.idpengarang')
            ->join('penerbit', 'penerbit.id', '=', 'buku.idpenerbit')
            ->join('kategori', 'kategori.id', '=', 'buku.idkategori')
            ->select(
                'buku.*',
                'pengarang.nama as pengarang',
                'penerbit.nama as penerbit',
                'kategori.nama as kategori'
            )
            ->where('isbn', 'like', '%' . $keyword . '%')
            ->orWhere('judul', 'like', '%' . $keyword . '%')
            ->orWhere('pengarang.nama', 'like', '%' . $keyword . '%')
            ->orWhere('penerbit.nama', 'like', '%' . $keyword . '%')
            ->orWhere('kategori.nama', 'like', '%' . $keyword . '%')
            ->paginate(5);
        return view('buku.index', compact('ar_buku', 'keyword'));
    }

    // membuat fungsi export csv
    public function bukucsv()
    {
        return Excel::download(new BukuExport, 'buku.csv');
    }
    
    // membuat fungsi export pdf
    public function bukuPDF()
    {
        $ar_buku = DB::table('buku')
            ->join('pengarang', 'pengarang.id', '=', 'buku.idpengarang')
            ->join('penerbit', 'penerbit.id', '=', 'buku.idpenerbit')
            ->join('kategori', 'kategori.id', '=', 'buku.idkategori')
            ->select(
                'buku.*',
                'pengarang.nama',
                'penerbit.nama AS penerbit',
                'kategori.nama AS kategori'
            )
            ->get();
        $pdf = PDF::loadView('buku/bukuPDF', ['ar_buku' => $ar_buku]);
        return $pdf->download('dataBuku.pdf');
    }


    public function create()
    {
        // mengarahkan ke halaman form input buku
        return view('buku.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
        ]);
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $destinationPath = public_path() . '/img';

        if ($request->hasFile('image')) {
            $file->move($destinationPath, $fileName);
        }

        //proses input data, tangkap request dari form buku
        DB::table('buku')->insert(
            [
                'isbn' => $request->isbn,
                'judul' => $request->judul,
                'tahun_cetak' => $request->tahun_cetak,
                'stok' => $request->stok,
                'foto' => '/img/' . $fileName,
                'idpengarang' => $request->idpengarang,
                'idpenerbit' => $request->idpenerbit,
                'idkategori' => $request->idkategori
            ]
        );
        //landing page
        return redirect('/buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //menampilkan detail buku
        $ar_buku = DB::table('buku')
            ->join('pengarang', 'pengarang.id', '=', 'buku.idpengarang')
            ->join('penerbit', 'penerbit.id', '=', 'buku.idpenerbit')
            ->join('kategori', 'kategori.id', '=', 'buku.idkategori')
            ->select(
                'buku.*',
                'pengarang.nama AS pengarang',
                'penerbit.nama AS penerbit',
                'kategori.nama AS kategori',
                'buku.foto'
            )->where('buku.id', '=', $id)->get();
        return view('buku.show', compact('ar_buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit buku
        $data = DB::table('buku')
            ->where('id', '=', $id)->get();
        return view('buku.form_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses edit data lama, tangkap request dari form edit buku
        DB::table('buku')->where('id', '=', $id)->update(
            [
                'isbn' => $request->isbn,
                'judul' => $request->judul,
                'tahun_cetak' => $request->tahun_cetak,
                'stok' => $request->stok,
                'foto' => $request->foto,
                'idpengarang' => $request->idpengarang,
                'idpenerbit' => $request->idpenerbit,
                'idkategori' => $request->idkategori
            ]
        );
        //Landing Page
        return redirect('/buku' . '/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data
        DB::table('buku')
            ->where('id', $id)->delete();
        return redirect('/buku');
    }
}
