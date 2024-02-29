<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('supplier')->emptyTable();
        $this->db->query('ALTER TABLE supplier AUTO_INCREMENT = 1');
        $data = [
            [
                'nama_supplier' => 'Agus Wicaksono',
                'alamat' => 'Tangerang Selatan',
                'no_telp' => '08123456789',
                'email' => 'AgusWicak@example.com',
            ],
            [
                'nama_supplier' => 'Saiful Hidayat',
                'alamat' => 'Jakarta Pusat',
                'no_telp' => '02188929292',
                'email' => 'ipul@example.com',
            ],
            [
                'nama_supplier' => 'Tatang Supratman',
                'alamat' => 'Jakarta Selatan',
                'no_telp' => '083877665476',
                'email' => 'tang@example.com',
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Insert data
        $this->db->table('supplier')->insertBatch($data);
    }
}
