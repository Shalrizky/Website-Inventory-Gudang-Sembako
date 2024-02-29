<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PembelianSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('pembelian')->emptyTable();
        $data = [
            [
                'id_supplier' => 1,
                'kd_brg' => 'B7070',
                'id_merek' => '1',
                'id_stok' => '3',
                'tgl_pembelian' => '2023-01-01',
                'tgl_kadaluarsa_pembelian' => '2024-12-01',
                'jumlah_pembelian' => 500,
                'harga_satuan' => 5000,
                'total_harga' => 50000,
                'status' => 'In Progress',
            ],
            [
                'id_supplier' => 1,
                'kd_brg' => 'E116R',
                'id_merek' => '4',
                'id_stok' => '6',
                'tgl_pembelian' => '2023-01-01',
                'tgl_kadaluarsa_pembelian' => '2024-12-01',
                'jumlah_pembelian' => 500,
                'harga_satuan' => 5000,
                'total_harga' => 50000,
                'status' => 'In Progress',
            ],
            [
                'id_supplier' => 2,
                'kd_brg' => 'E566D',
                'id_merek' => '3',
                'id_stok' => '4',
                'tgl_pembelian' => '2023-12-03',
                'tgl_kadaluarsa_pembelian' => '2026-6-15',
                'jumlah_pembelian' => 800,
                'harga_satuan' => 10000,
                'total_harga' => 8000000,
                'status' => 'In Progress',
            ],
            [
                'id_supplier' => 3,
                'kd_brg' => 'D53ER',
                'id_merek' => '3',
                'id_stok' => '7',
                'tgl_pembelian' => '2024-01-20',
                'tgl_kadaluarsa_pembelian' => '2025-12-01',
                'jumlah_pembelian' => 300,
                'harga_satuan' => 12000,
                'total_harga' => 360000,
                'status' => 'In Progress',
            ],
            [
                'id_supplier' => 1,
                'kd_brg' => 'ABT43',
                'id_merek' => '1',
                'id_stok' => '8',
                'tgl_pembelian' => '2023-12-15',
                'tgl_kadaluarsa_pembelian' => '2026-12-01',
                'jumlah_pembelian' => 650,
                'harga_satuan' => 12000,
                'total_harga' => 360000,
                'status' => 'In Progress',
            ],

        ];

        // Insert data
        $this->db->table('pembelian')->insertBatch($data);
    }
}
