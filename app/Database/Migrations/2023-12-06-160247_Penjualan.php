<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penjualan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pelanggan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_pelanggan' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'no_ref' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'tgl_pemesanan' => [
                'type' => 'DATE',
            ],
            'tgl_pengajuan' => [
                'type' => 'DATE',
            ],
            'jumlah_brg_dipesan' => [
                'type' => 'INT',
                'constraint' => 200,
                'unsigned' => true,
            ],
            'total_harga' => [
                'type' => 'INT',
                'constraint' => 200,
                'unsigned' => true,
            ],
            'status' => [
                'type' => 'ENUM("In Progress", "Stock Out")',
                'default' => 'In Progress',
            ],

        ]);

        $this->forge->addKey('id_pelanggan', true);
        $this->forge->createTable('penjualan');
    }

    public function down()
    {
        $this->forge->dropTable('penjualan');
    }
}
