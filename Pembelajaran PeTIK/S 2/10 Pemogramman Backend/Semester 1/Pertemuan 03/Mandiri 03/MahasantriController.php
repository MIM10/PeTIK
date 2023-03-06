<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasantriController extends Controller
{
    public function dataMahasantri(){
        $no = 1;
        // array scalar
        $s1 = ['nama'=>'Fawwaz', 'alamat'=>'Jakarta'];
        $s2 = ['nama'=>'Inaya', 'alamat'=>'Depok'];
        $s3 = ['nama'=>'Zidan', 'alamat'=>'Sinjai'];
        $s4 = ['nama'=>'Bambang', 'alamat'=>'Mojokerto'];
        $s5 = ['nama'=>'Unyil', 'alamat'=>'Bandung'];
        $judul = ['No','Nama','Alamat'];
        // array associative
        $siswa = [$s1,$s2,$s3,$s4,$s5];
        return view('data_mahasantri', compact('no','judul','siswa'));
    }
}
