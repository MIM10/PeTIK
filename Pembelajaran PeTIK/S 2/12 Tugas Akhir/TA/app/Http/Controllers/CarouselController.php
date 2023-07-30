<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Paginator::useBootstrap();
        $keyword = $request->get('keyword');
        //dapatkan seluruh data carousel dengan query builder
        $ar_carousel = DB::table('carousel')
            ->join('kategori', 'kategori.id', '=', 'carousel.idkategori')
            ->select(
                'carousel.*',
                'kategori.nama as kategori'
            )
            ->where('carousel.nama', 'like', '%' . $keyword . '%')
            ->orWhere('kegunaan', 'like', '%' . $keyword . '%')
            ->orWhere('harga', 'like', '%' . $keyword . '%')
            ->orWhere('kategori.nama', 'like', '%' . $keyword . '%')
            ->orWhere('komposisi', 'like', '%' . $keyword . '%')
            ->orWhere('kontra_indikasi', 'like', '%' . $keyword . '%')
            ->orWhere('aturan_pakai', 'like', '%' . $keyword . '%')
            ->paginate(10);
        //arahkan ke halaman baru dengan menyertakan data carousel(compact)
        //di resources/views/carousel/index.blade.php
        return view('populer.index', compact('ar_carousel', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // mengarahkan ke hal form input populer
        return view('populer.form');
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

        //proses input data, tangkap request dari form populer
        DB::table('carousel')->insert(
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
        return redirect('/populer');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ar_carousel = DB::table('carousel')->where('carousel.id', '=', $id)
            ->join('kategori', 'kategori.id', '=', 'carousel.idkategori')
            ->select('carousel.*', 'kategori.nama as kategori')
            ->get();
        return view('populer.show', compact('ar_carousel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit carousel
        $data = DB::table('carousel')
            ->where('id', '=', $id)->get();
        return view('populer.form_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses edit data lama, tangkap request dari form edit carousel
        DB::table('carousel')->where('id', '=', $id)->update(
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
        return redirect('/populer' . '/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Menghapus file gambar dari folder
        $carousel = DB::table('carousel')->select('foto')->where('id', $id)->first();
        if ($carousel) {
            $fotoPath = public_path($carousel->foto);
            if (File::exists($fotoPath)) {
                File::delete($fotoPath);
            }
        }

        // Menghapus data dari tabel
        DB::table('carousel')->where('id', $id)->delete();

        return redirect('/populer');
    }
}
