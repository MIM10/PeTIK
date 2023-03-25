<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class MahasantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasantri')->insert(
            [
                [
                    'nim' => '163127052',
                    'nama' => 'Bedu',
                    'jurusan' => 'Pengembangan Perangkat Lunak (PPL)',
                    'alamat' => 'Jl. Sejahtera',
                    'Kota' => 'Padang',
                    'provinsi' => 'Sumatera Barat',
                    'email' => 'bedu123@gmail.com'
                ],
                [
                    'nim' => '288501790',
                    'nama' => 'Ucup',
                    'jurusan' => 'Pengelolaan Sistem Jaringan (PSJ)',
                    'alamat' => 'Jl. Megaluh',
                    'Kota' => 'Jombang',
                    'provinsi' => 'Jawa Timur',
                    'email' => 'ucup434@gmail.com'
                ],
                [
                    'nim' => '617193206',
                    'nama' => 'Usro',
                    'jurusan' => 'Digital Marketing (DM)',
                    'alamat' => 'Jl. Kecambah',
                    'Kota' => 'Bandung',
                    'provinsi' => 'Jawa Barat',
                    'email' => 'usro55@gmail.com'
                ],
                [
                    'nim' => '641579701',
                    'nama' => 'Yusrin',
                    'jurusan' => 'Pengembangan Perangkat Lunak (PPL)',
                    'alamat' => 'Jl. Mujair',
                    'Kota' => 'Palembang',
                    'provinsi' => 'Sumatera Selatan',
                    'email' => 'yusrin145@gmail.com'
                ],
                [
                    'nim' => '123039295',
                    'nama' => 'Andi',
                    'jurusan' => 'Digital Marketing (DM)',
                    'alamat' => 'Jl. Belimbing',
                    'Kota' => 'Depok',
                    'provinsi' => 'Jawa Barat',
                    'email' => 'andy88@gmail.com'
                ],
                [
                    'nim' => '163698052',
                    'nama' => 'Yuyun',
                    'jurusan' => 'Pengelolaan Sistem Jaringan (PSJ)',
                    'alamat' => 'Jl. Nangka',
                    'Kota' => 'Malang',
                    'provinsi' => 'Jawa Timur',
                    'email' => 'yuyun123@gmail.com'
                ],

            ]
        );


        // for ($i=0; $i < 10; $i++){
        //     DB::table('pegawai')->insert([
        //         'nip' => rand(),
        //         'nama' => uniqid('nama_'),
        //         'jurusan' => uniqid('jurusan_'),
        //         'alamat' => uniqid('alamat_'),
        //         'email' => uniqid().'@gmail.com',
        //         'created_at' => new \DateTime,
        //         'updated_at' => null,
        //     ]);
        // }
    }
}
