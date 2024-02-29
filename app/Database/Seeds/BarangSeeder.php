<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run()
    {
        // Hapus semua data dari tabel barang

        $this->db->table('barang')->emptyTable();


        $merek1ID = 1;
        $merek2ID = 2;
        $merek3ID = 3;
        $merek4ID = 4;


        $data = [
            [
                'kd_brg' => 'B78A5',
                'id_merek' => $merek1ID,
                'gambar_brg' => '/template/images/produk/indomie-img.png',
                'nama_brg' => 'Indomie',
            ],
            [
                'kd_brg' => 'B90A1',
                'id_merek' => $merek2ID,
                'gambar_brg' => '/template/images/produk/segitiga-biru-img.png',
                'nama_brg' => 'Segitiga Biru',
            ],
            [
                'kd_brg' => 'B7070',
                'id_merek' => $merek1ID,
                'gambar_brg' => '/template/images/produk/minyak-bimoli-img.png',
                'nama_brg' => 'Minyak Bimoli',
            ],
            [
                'kd_brg' => 'A78D2',
                'id_merek' => $merek2ID,
                'gambar_brg' => '/template/images/produk/la-fonte-pasta-img.jpg',
                'nama_brg' => 'La Fonte Pasta',
            ],
            [
                'kd_brg' => 'E566D',
                'id_merek' => $merek3ID,
                'gambar_brg' => '/template/images/produk/gulaku-img.jpg',
                'nama_brg' => 'Gulaku',
            ],
            [
                'kd_brg' => 'E116R',
                'id_merek' => $merek4ID,
                'gambar_brg' => '/template/images/produk/kecap-img.jpg',
                'nama_brg' => 'Kecap Bango',
            ],
            [
                'kd_brg' => 'D53ER',
                'id_merek' => $merek3ID,
                'gambar_brg' => '/template/images/produk/gula-rose-brand-img.jpg',
                'nama_brg' => 'Rose Brand Gula Kristal Premium',
            ],
            [
                'kd_brg' => 'ABT43',
                'id_merek' => $merek1ID,
                'gambar_brg' => '/template/images/produk/ichi-ocha-img.jpg',
                'nama_brg' => 'Ichi Ocha',
            ],

        ];

        $this->db->table('barang')->insertBatch($data);
    }
}
