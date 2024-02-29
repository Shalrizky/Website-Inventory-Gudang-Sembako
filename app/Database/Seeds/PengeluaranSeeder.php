<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PengeluaranSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('pengeluaran')->emptyTable();
        $data = [
            [
                'id_pelanggan' => '1',
                'kd_brg' => 'B78A5',
                'id_stok' => '1',
                'id_merek' => '1',
                'jumlah_barang' => 20,
            ],
            [
                'id_pelanggan' => '1',
                'kd_brg' => 'B90A1',
                'id_stok' => '2',
                'id_merek' => '2',
                'jumlah_barang' => 30,
            ],
            [
                'id_pelanggan' => '2',
                'kd_brg' => 'B7070',
                'id_stok' => '3',
                'id_merek' => '1',
                'jumlah_barang' => 100,
            ],
        ];

        // Insert data
        $this->db->table('pengeluaran')->insertBatch($data);
    }
}
