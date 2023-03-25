<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        //dapatkan seluruh data kategori dengan query builder
        $ar_kategori = DB::table('kategori')
            ->where('nama', 'like', '%' . $keyword . '%')
            ->get();
        //arahkan ke halaman baru dengan menyertakan data kategori(compact)
        //di resources/views/kategori/index.blade.php
        return view('kategori.index', compact('ar_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // mengarahkan ke hal form input kategori
        return view('kategori.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //proses input data, tangkap request dari form kategori
        DB::table('kategori')->insert(
            [
                'nama' => $request->nama
            ]
        );
        //landing page
        return redirect('/kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ar_kategori = DB::table('kategori')->where('kategori.id', '=', $id)->get();
        return view('kategori.show', compact('ar_kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit kategori
        $data = DB::table('kategori')
            ->where('id', '=', $id)->get();
        return view('kategori.form_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses edit data lama, tangkap request dari form edit kategori
        DB::table('kategori')->where('id', '=', $id)->update(
            [
                'nama' => $request->nama
            ]
        );
        //Landing Page
        return redirect('/kategori' . '/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data
        DB::table('kategori')
            ->where('id', $id)->delete();
        return redirect('/kategori');
    }
}
