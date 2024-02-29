<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StokSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('stok')->emptyTable();
        $this->db->query('ALTER TABLE stok AUTO_INCREMENT = 1');

        $data = [
            [
                'kd_brg' => 'B78A5', 
                'jumlah_stok' => 100,
                'tgl_kadaluarsa' => '2024-12-01',
                'updated_at' => date('Y-m-d'), 
            ],
            [
                'kd_brg' => 'B90A1',
                'jumlah_stok' => 50,
                'tgl_kadaluarsa' => '2024-11-29',
                'updated_at' => date('Y-m-d'), 
            ],
            [
                'kd_brg' => 'B7070',
                'jumlah_stok' => 0,
                'tgl_kadaluarsa' => '2024-11-29',
                'updated_at' => date('Y-m-d'), 
            ],
            [
                'kd_brg' => 'E566D',
                'jumlah_stok' => 18,
                'tgl_kadaluarsa' => '2024-02-10',
                'updated_at' => date('Y-m-d'), 
            ],
            [
                'kd_brg' => 'A78D2',
                'jumlah_stok' => 15,
                'tgl_kadaluarsa' => '2024-02-29',
                'updated_at' => date('Y-m-d'), 
            ],
            [
                'kd_brg' => 'E116R',
                'jumlah_stok' => 0,
                'tgl_kadaluarsa' => '2023-10-01',
                'updated_at' => date('Y-m-d'), 
            ],
            [
                'kd_brg' => 'D53ER',
                'jumlah_stok' => 20,
                'tgl_kadaluarsa' => '2024-01-05',
                'updated_at' => date('Y-m-d'), 
            ],
            [
                'kd_brg' => 'ABT43',
                'jumlah_stok' => 0,
                'tgl_kadaluarsa' => '2023-10-01',
                'updated_at' => date('Y-m-d'), 
            ],
            
        ];
        for ($i = 0; $i < count($data); $i++) {
            $status = 'Banyak';
            if ($data[$i]['jumlah_stok'] <= 0) {
                $status = 'Habis';
            } elseif ($data[$i]['jumlah_stok'] <= 20) {
                $status = 'Kurang';
            }

            $data[$i]['status_stok'] = $status;
        }

        $this->db->table('stok')->insertBatch($data);
    }
}
