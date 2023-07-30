<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Produk;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
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
            ->get();
        
        $ar_carousel = DB::table('carousel')
        ->join('kategori', 'kategori.id', '=', 'carousel.idkategori')
        ->select(
            'carousel.*',
            'kategori.nama as kategori'
        )->get();

        //arahkan ke halaman baru dengan menyertakan data produk(compact)
        //di resources/views/produk/index.blade.php
        return view('user.index', compact('ar_produk', 'ar_carousel', 'keyword'));
    }

    public function kategori1(Request $request)
    {
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
            })->get();
    
        $ar_carousel = DB::table('carousel')
        ->join('kategori', 'kategori.id', '=', 'carousel.idkategori')
        ->select(
            'carousel.*',
            'kategori.nama as kategori'
        )->get();
        
        return view('user.index', compact('ar_produk', 'ar_carousel', 'keyword'));
    }

    public function kategori2(Request $request)
    {
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
            })->get();
    
        $ar_carousel = DB::table('carousel')
        ->join('kategori', 'kategori.id', '=', 'carousel.idkategori')
        ->select(
            'carousel.*',
            'kategori.nama as kategori'
        )->get();
        
        return view('user.index', compact('ar_produk', 'ar_carousel', 'keyword'));
    }

    public function kategori3(Request $request)
    {
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
            })->get();
        
        $ar_carousel = DB::table('carousel')
        ->join('kategori', 'kategori.id', '=', 'carousel.idkategori')
        ->select(
            'carousel.*',
            'kategori.nama as kategori'
        )->get();
        
        return view('user.index', compact('ar_produk', 'ar_carousel', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
