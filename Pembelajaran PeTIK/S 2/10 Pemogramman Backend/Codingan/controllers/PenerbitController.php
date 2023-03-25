<?php

namespace App\Http\Controllers;

use DB;
use App\Models\penerbit;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        Paginator::useBootstrap();
        //dapatkan seluruh data penerbit dengan query builder
        $ar_penerbit = DB::table('penerbit')
            ->where('nama', 'like', '%' . $keyword . '%')
            ->orWhere('alamat', 'like', '%' . $keyword . '%')
            ->orWhere('email', 'like', '%' . $keyword . '%')
            ->orWhere('website', 'like', '%' . $keyword . '%')
            ->orWhere('telp', 'like', '%' . $keyword . '%')
            ->orWhere('cp', 'like', '%' . $keyword . '%')
            ->paginate(5);
        //arahkan ke halaman baru dengan menyertakan data penerbit(compact)
        //di resources/views/penerbit/index.blade.php
        return view('penerbit.index', compact('ar_penerbit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // mengarahkan ke hal form input penerbit
        return view('penerbit.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //proses input data, tangkap request dari form penerbit
        DB::table('penerbit')->insert(
            [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'website' => $request->website,
                'telp' => $request->telepon,
                'cp' => $request->cp
            ]
        );
        //landing page
        return redirect('/penerbit');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ar_penerbit = DB::table('penerbit')->where('penerbit.id', '=', $id)->get();
        return view('penerbit.show', compact('ar_penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit penerbit
        $data = DB::table('penerbit')
            ->where('id', '=', $id)->get();
        return view('penerbit.form_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses edit data lama, tangkap request dari form edit penerbit
        DB::table('penerbit')->where('id', '=', $id)->update(
            [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'website' => $request->website,
                'telp' => $request->telp,
                'cp' => $request->cp
            ]
        );
        //Landing Page
        return redirect('/penerbit' . '/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data
        DB::table('penerbit')
            ->where('id', $id)->delete();
        return redirect('/penerbit');
    }
}
