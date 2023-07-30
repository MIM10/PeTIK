<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('carousel')->insert([
            [
                'nama' => 'N-GREEN',
                'kegunaan' => 'Membantu memelihara daya tahan tubuh.',
                'harga' => '130.000',
                'stok' => 45,
                'idkategori' => 1,
                'komposisi' => 'Artrosphira plantensis ekstrak, Mentha arvensis herba ekstrak,
                Cyclea barbata Myers Folium ekstrak, Centella asiatica herba ekstrak, Annona muricate folium ekstrak, Sauropus androgynus folium ekstrak, Aloevera folium ekstrak, Andrographis paniculata herba ekstrak.',
                'kontra_indikasi' => '-',
                'aturan_pakai' => 'Dewasa 3 x 1 kapsul sehari',
                'foto' => '/img/nGreen.png',
            ],
            [
                'nama' => 'Bilberry',
                'kegunaan' => 'Membantu memelihara kesehatan mata dan kesehatan tubuh.',
                'harga' => '150.000',
                'stok' => 32,
                'idkategori' => 1,
                'komposisi' => 'Bilberry (Vaccinum myrtillus fructus extractum).',
                'kontra_indikasi' => '-',
                'aturan_pakai' => 'Dewasa 2 kali sehari 2 kapsul, diminum setelah makan dan perbanyak minum air hangat.',
                'foto' => '/img/bilberry.png',
            ],
            [
                'nama' => 'Andrographis Centella',
                'kegunaan' => 'Secara tradisional digunakan untuk melindungi hati, meningkatkan sistem kekebalan tubuh, menurunkan panas, menghilangkan rasa nyeri dan antibiotik alami.',
                'harga' => '85.000',
                'stok' => 15,
                'idkategori' => 1,
                'komposisi' => 'Sambiloto (Andrographis paniculata), Alang-alang (Imperata cylindrica), Pegagan (Centella Asiatic).',
                'kontra_indikasi' => 'Ibu hamil disanarankan konsultasi dengan dokter bila mengkonsumsi herbal ini.',
                'aturan_pakai' => '3 x 2 kapsul sebelum makan',
                'foto' => '/img/andrographis.png',
            ],
            [
                'nama' => 'Procumin Propolis',
                'kegunaan' => 'Membantu menjaga kesehatan.',
                'harga' => '175.000',
                'stok' => 7,
                'idkategori' => 1,
                'komposisi' => 'Tiap kapsul lunak mengandung: Natural Nigella Sativa Oil 400mg, Natural Propolis 100mg.',
                'kontra_indikasi' => '-',
                'aturan_pakai' => 'Sebaiknya diminum setelah makan, 1-2 kapsul lunak perhari, disertai banyak minum air putih.',
                'foto' => '/img/procumin_propolis.png',
            ],
            [
                'nama' => 'Madu Pahit',
                'kegunaan' => 'Madu Pahit memiliki rasa yang khas karena diproduksi oleh lebah jenis Apis dorsata yang mengonsumsi nektar dari kuncup pohon yang pahit seperti tanaman kirinyuh, pohon jati, pohon mahoni, tanaman benalu dan tanaman Clidemia hirta atau tanaman keduduk bulu. Madu Pahit mempunyai kandungan alkaloid yang cukup tinggi. Zat ini berfungsi sebagai anti bakteri alami yang dapat membunuh berbagai bakteri yang dapat merugikan tubuh.',
                'harga' => '120.000',
                'stok' => 7,
                'idkategori' => 3,
                'komposisi' => 'Madu 100%.',
                'kontra_indikasi' => '-',
                'aturan_pakai' => '-',
                'foto' => '/img/madu_pahit.png',
            ],
            [
                'nama' => 'Hibis Pantyliners',
                'kegunaan' => 'HIBIS adalah solusi kesehatan kewanitaan dengan sinergi terbaik herba pilihan dengan proses menggunakan teknologi modern sehingga para wanita tampil penuh percaya diri dan menjadikan lebih aktif serta produktif.
                
                - Hibis menjaga kualitas, fungsi, serta mudah dibawa kemana saja.
                - Lapisan penyerap dengan daya serap yang tinggi.
                - Membebaskan permasalahan nyeri haid dan menghilangkan rasa tidak nyaman.
                - Dapat menghilangkan bau tidak sedap dan menjaga kesegaran.
                - Membantu mencegah iritasi kulit, rasa gatal, dan antibakteri',
                'harga' => '225.000',
                'stok' => 28,
                'idkategori' => 2,
                'komposisi' => '-',
                'kontra_indikasi' => '-',
                'aturan_pakai' => '-',
                'foto' => '/img/hibis_pantyliners.png',
            ],
            [
                'nama' => 'Greenwash Detergen',
                'kegunaan' => 'Super High Concentrate: Dengan takaran pemakaian yang sedikit mampu menghasilkan hasil cucian yang bersih maksimal.
                Enzymes Technology: Lebih efektif dalam membersihkan noda.
                Active Oxygen: Oksigen yang akan mengangkat kotoran hingga ke serat kain.
                Brightener: Mencerahkan warna pakaian.
                Low Suds: Rendah Busa, cucian bersih hanya dengan sedikit air bilasan. Hemat air dan tenaga, cocok untuk mesin cuci tipe apapun.
                Anti karat: Mencegah dan melindungi komponen bahan logam dalam mesin cuci dari karatan.
                Antiredeposisi: Mencegah kotoran yang sudah lepas menempel kembali
                Biodegradable: Bahan baku yang eco-friendly sehingga limbah deterjen dapat terurai dengan baik di tanah.',
                'harga' => '50.000',
                'stok' => 65,
                'idkategori' => 2,
                'komposisi' => '-',
                'kontra_indikasi' => '-',
                'aturan_pakai' => '-',
                'foto' => '/img/gwsdetergen.png',
            ],
            [
                'nama' => 'Sabun Kolagen',
                'kegunaan' => 'Sabun Kolagen digunakan untuk perawatan kesehatan dan sebagai bahan kosmetik. Sabun Transparant Kolagen membersihkan kulit tubuh sekaligus melembabkan, sehingga kulit menjadi bersih, terasa lembut dan tampak lebih bercahaya setiap hari.',
                'harga' => '25.000',
                'stok' => 88,
                'idkategori' => 2,
                'komposisi' => 'Succrose, Water, Cocos Nucifera Oil,Propylene glycol, Stearic acid, Ethanol Denat, Triethanolamine, Glycerin, Sodium hydroxide, Cocamidopropyl betaine, Parfum, Marine Collagen, Glycolic acid, BHT',
                'kontra_indikasi' => '-',
                'aturan_pakai' => 'Gunakan Sabun Kolagen setiap mandi, untuk hasil yang lebih sempurna.',
                'foto' => '/img/sabunKolagen.png',
            ],
        ]);
    }
}
