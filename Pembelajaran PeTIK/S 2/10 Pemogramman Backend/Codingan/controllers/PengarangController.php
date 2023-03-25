<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Pengarang;

class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        //dapatkan seluruh data pengarang dengan query builder
        $ar_pengarang = DB::table('pengarang')
            ->where('nama', 'like', '%' . $keyword . '%')
            ->orWhere('email', 'like', '%' . $keyword . '%')
            ->orWhere('hp', 'like', '%' . $keyword . '%')
            ->get();
        //arahkan ke halaman baru dengan menyertakan data pengarang(compact)
        //di resources/views/pengarang/index.blade.php
        return view('pengarang.index', compact('ar_pengarang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // mengarahkan ke hal form input pengarang
        return view('pengarang.form');
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

        //proses input data, tangkap request dari form pengarang
        DB::table('pengarang')->insert(
            [
                'nama' => $request->nama,
                'email' => $request->email,
                'hp' => $request->hp,
                'foto' => '/img/' . $fileName
            ]
        );
        //landing page
        return redirect('/pengarang');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ar_pengarang = DB::table('pengarang')->where('pengarang.id', '=', $id)->get();
        return view('pengarang.show', compact('ar_pengarang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit pengarang
        $data = DB::table('pengarang')
            ->where('id', '=', $id)->get();
        return view('pengarang.form_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses edit data lama, tangkap request dari form edit pengarang
        DB::table('pengarang')->where('id', '=', $id)->update(
            [
                'nama' => $request->nama,
                'email' => $request->email,
                'hp' => $request->hp,
                'foto' => $request->foto
            ]
        );
        //Landing Page
        return redirect('/pengarang' . '/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data
        DB::table('pengarang')
            ->where('id', $id)->delete();
        return redirect('/pengarang');
    }
}
