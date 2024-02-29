<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MerekSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('merek')->emptyTable();
        //  $this->db->query('ALTER TABLE merek AUTO_INCREMENT = 1');

        $data = [
            [
                'nama_merek' => 'Indofood',
                'deskripsi_merek' => '',
            ],
            [
                'nama_merek' => 'Bogasari',
                'deskripsi_merek' => '',
            ],
            [
                'nama_merek' => 'Gula Pasir',
                'deskripsi_merek' => '',
            ],
            [
                'nama_merek' => 'Kecap Manis',
                'deskripsi_merek' => '',
            ],

        ];

        $this->db->table('merek')->insertBatch($data);
    }
}
