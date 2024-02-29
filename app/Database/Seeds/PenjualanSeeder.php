<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PenjualanSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('penjualan')->emptyTable();
        $data = [
            [
                'nama_pelanggan' => 'Udin Sodikin',
                'no_ref' => 20230001,
                'tgl_pemesanan' => '2023-12-06',
                'tgl_pengajuan' => '2023-12-07',
                'jumlah_brg_dipesan' => 80,
                'total_harga' => 1000000,
                'status' => 'In Progress',
            ],
            [
                'nama_pelanggan' => 'Siti Nuralizah',
                'no_ref' => 20230002,
                'tgl_pemesanan' => '2023-12-06',
                'tgl_pengajuan' => '2023-12-07',
                'jumlah_brg_dipesan' => 100,
                'total_harga' => 1000000,
                'status' => 'In Progress',
            ],
        ];

        // Insert data
        $this->db->table('penjualan')->insertBatch($data);
    }
}
