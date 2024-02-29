<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ReturPenjualan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_retur_penjualan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_pelanggan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
               
            ],
            'id_pengeluaran' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_stok' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'kd_brg' => [
                'type' => 'CHAR',
                'constraint' => 5,
            ],
            'created_at' => [
                'type' => 'DATE',
            ],
            'updated_at' => [
                'type' => 'DATE',
            ],
            'jumlah_retur' => [
                'type' => 'INT',
                'constraint' => 100,
                'unsigned' => true,
            ],
            'status_retur' => [
                'type' => 'ENUM("Perlu Retur", "Stock In")',
                'default' => 'Perlu Retur',
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
        ]);

        $this->forge->addKey('id_retur_penjualan', true);
        $this->forge->addForeignKey('kd_brg', 'barang', 'kd_brg', 'CASCADE');
        $this->forge->addForeignKey('id_pelanggan', 'penjualan', 'id_pelanggan', 'CASCADE');
        $this->forge->addForeignKey('id_pengeluaran', 'pengeluaran', 'id_pengeluaran', 'CASCADE');
        $this->forge->addForeignKey('id_stok', 'stok', 'id_stok', 'CASCADE'); 
        $this->forge->createTable('retur_penjualan');
    }

    public function down()
    {
        $this->forge->dropTable('retur_penjualan');
    }
}
