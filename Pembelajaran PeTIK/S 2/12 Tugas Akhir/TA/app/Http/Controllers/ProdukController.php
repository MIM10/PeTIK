<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Paginator::useBootstrap();
        $keyword = $request->get('keyword');
        //dapatkan seluruh data produk dengan query builder
        $ar_produk = DB::table('produk')
            ->join('kategori', 'kategori.id', '=', 'produk.idkategori')
            ->select(
                'produk.*',
                'kategori.nama as kategori'
            )
            ->where('produk.nama', 'like', '%' . $keyword . '%')
            ->orWhere('kegunaan', 'like', '%' . $keyword . '%')
            ->orWhere('harga', 'like', '%' . $keyword . '%')
            ->orWhere('kategori.nama', 'like', '%' . $keyword . '%')
            ->orWhere('komposisi', 'like', '%' . $keyword . '%')
            ->orWhere('kontra_indikasi', 'like', '%' . $keyword . '%')
            ->orWhere('aturan_pakai', 'like', '%' . $keyword . '%')
            ->paginate(10);
        //arahkan ke halaman baru dengan menyertakan data produk(compact)
        //di resources/views/produk/index.blade.php
        return view('produk.index', compact('ar_produk', 'keyword'));
    }

    public function kategori1(Request $request)
    {
        Paginator::useBootstrap();
        $keyword = $request->get('keyword');
        //dapatkan seluruh data produk dengan query builder
        $ar_produk = DB::table('produk')
            ->join('kategori', 'kategori.id', '=', 'produk.idkategori')
            ->select(
                'produk.*',
                'kategori.nama as kategori'
            )->where('produk.idkategori', 1)
            ->where(function ($query) use ($keyword) {
                $query->where('produk.nama', 'like', '%' . $keyword . '%')
                    ->orWhere('kegunaan', 'like', '%' . $keyword . '%')
                    ->orWhere('harga', 'like', '%' . $keyword . '%')
                    ->orWhere('kategori.nama', 'like', '%' . $keyword . '%')
                    ->orWhere('komposisi', 'like', '%' . $keyword . '%')
                    ->orWhere('kontra_indikasi', 'like', '%' . $keyword . '%')
                    ->orWhere('aturan_pakai', 'like', '%' . $keyword . '%');
            })->paginate(10);
        return view('produk.index', compact('ar_produk', 'keyword'));
    }

    public function kategori2(Request $request)
    {
        Paginator::useBootstrap();
        $keyword = $request->get('keyword');
        //dapatkan seluruh data produk dengan query builder
        $ar_produk = DB::table('produk')
            ->join('kategori', 'kategori.id', '=', 'produk.idkategori')
            ->select(
                'produk.*',
                'kategori.nama as kategori'
            )->where('produk.idkategori', 2)
            ->where(function ($query) use ($keyword) {
                $query->where('produk.nama', 'like', '%' . $keyword . '%')
                    ->orWhere('kegunaan', 'like', '%' . $keyword . '%')
                    ->orWhere('harga', 'like', '%' . $keyword . '%')
                    ->orWhere('kategori.nama', 'like', '%' . $keyword . '%')
                    ->orWhere('komposisi', 'like', '%' . $keyword . '%')
                    ->orWhere('kontra_indikasi', 'like', '%' . $keyword . '%')
                    ->orWhere('aturan_pakai', 'like', '%' . $keyword . '%');
            })->paginate(10);
        return view('produk.index', compact('ar_produk', 'keyword'));
    }

    public function kategori3(Request $request)
    {
        Paginator::useBootstrap();
        $keyword = $request->get('keyword');
        //dapatkan seluruh data produk dengan query builder
        $ar_produk = DB::table('produk')
            ->join('kategori', 'kategori.id', '=', 'produk.idkategori')
            ->select(
                'produk.*',
                'kategori.nama as kategori'
            )->where('produk.idkategori', 3)
            ->where(function ($query) use ($keyword) {
                $query->where('produk.nama', 'like', '%' . $keyword . '%')
                    ->orWhere('kegunaan', 'like', '%' . $keyword . '%')
                    ->orWhere('harga', 'like', '%' . $keyword . '%')
                    ->orWhere('kategori.nama', 'like', '%' . $keyword . '%')
                    ->orWhere('komposisi', 'like', '%' . $keyword . '%')
                    ->orWhere('kontra_indikasi', 'like', '%' . $keyword . '%')
                    ->orWhere('aturan_pakai', 'like', '%' . $keyword . '%');
            })->paginate(10);
        return view('produk.index', compact('ar_produk', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // mengarahkan ke hal form input produk
        return view('produk.form');
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
        $destinationPath = public_path('img');

        if ($request->hasFile('image')) {
            $file->move($destinationPath, $fileName);
        }

        //proses input data, tangkap request dari form produk
        DB::table('produk')->insert(
            [
                'nama' => $request->nama,
                'kegunaan' => $request->kegunaan,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'idkategori' => $request->idkategori,
                'komposisi' => $request->komposisi,
                'kontra_indikasi' => $request->kontra_indikasi,
                'aturan_pakai' => $request->aturan_pakai,
                'foto' => '/img/' . $fileName
            ]
        );
        //landing page
        return redirect('/produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ar_produk = DB::table('produk')->where('produk.id', '=', $id)
            ->join('kategori', 'kategori.id', '=', 'produk.idkategori')
            ->select('produk.*', 'kategori.nama as kategori')
            ->get();
        return view('produk.show', compact('ar_produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit produk
        $data = DB::table('produk')
            ->where('id', '=', $id)->get();
        return view('produk.form_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses edit data lama, tangkap request dari form edit produk
        DB::table('produk')->where('id', '=', $id)->update(
            [
                'nama' => $request->nama,
                'kegunaan' => $request->kegunaan,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'idkategori' => $request->idkategori,
                'komposisi' => $request->komposisi,
                'kontra_indikasi' => $request->kontra_indikasi,
                'aturan_pakai' => $request->aturan_pakai,
                'foto' => $request->foto
            ]
        );
        //Landing Page
        return redirect('/produk' . '/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        // Menghapus file gambar dari folder
        $produk = DB::table('produk')->select('foto')->where('id', $id)->first();
        if ($produk) {
            $fotoPath = public_path($produk->foto);
            if (File::exists($fotoPath)) {
                File::delete($fotoPath);
            }
        }

        // Menghapus data dari tabel
        DB::table('produk')->where('id', $id)->delete();

        return redirect('/produk');

        // versi lama yg gagal
        // if (!empty($request->file)) {
        //     $file = DB::table('produk')->select('file')->where('id', $id)->get();
        //     foreach ($file as $f) {
        //         $fileName = $f->file;
        //     }
        //     File::delete(public_path('img' . $fileName));
        // }

        // DB::table('produk')
        //     ->where('id', $id)->delete();
        // return redirect('/produk');
    }
}
