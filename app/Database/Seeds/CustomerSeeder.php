<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('customer')->emptyTable();
        $this->db->query('ALTER TABLE customer AUTO_INCREMENT = 1');
        $data = [
            [
                'nama_customer' => 'Riyanti Safirti',
                'alamat_customer' => 'Tangerang Selatan',
                'no_telp_customer' => '08216676761',
                'email_customer' => 'Riyanti@example.com',
            ],
            [
                'nama_customer' => 'Nadira Rahmadani',
                'alamat_customer' => 'Tangerang Selatan',
                'no_telp_customer' => '09315542542',
                'email_customer' => 'Nadira@example.com',
            ],
            [
                'nama_customer' => 'Ahmad Dava',
                'alamat_customer' => 'Jakarta Pusat',
                'no_telp_customer' => '08191902292',
                'email_customer' => 'Dava@example.com',
            ]
        ];

        // Insert data
        $this->db->table('customer')->insertBatch($data);
    }
}
