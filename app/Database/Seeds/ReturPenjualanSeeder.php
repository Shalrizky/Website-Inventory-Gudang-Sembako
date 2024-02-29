<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ReturPenjualanSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('retur_penjualan')->emptyTable();
        $data = [
            [
                'id_pelanggan' => 1,
                'id_pengeluaran' => 1,
                'id_stok' => 1,
                'kd_brg' => 'B78A5',
                'created_at' => '2023-12-10',
                'updated_at' => '2024-01-05',
                'jumlah_retur' => 20,
                'status_retur' => 'Perlu Retur',
                'keterangan' => 'Kerusakan pada produk',
            ],
            [
                'id_pelanggan' => 1,
                'id_pengeluaran' => 1,
                'id_stok' => 6,
                'kd_brg' => 'E116R',
                'created_at' => '2023-12-10',
                'updated_at' => '2024-01-05',
                'jumlah_retur' => 150,
                'status_retur' => 'Perlu Retur',
                'keterangan' => 'Produk Tidak sesuai',
            ],
            // ... more entries as needed
        ];

        // Insert data
        $this->db->table('retur_penjualan')->insertBatch($data);
    }
}
