<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengeluaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengeluaran' => [
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
            'kd_brg' => [
                'type' => 'CHAR',
                'constraint' => 5, 
            ],
            'id_stok' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_merek' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'jumlah_barang' => [
                'type' => 'INT',
                'constraint' => 100,
                'unsigned' => true,
            ],
        ]);
    
        $this->forge->addKey('id_pengeluaran', true);
        $this->forge->addForeignKey('kd_brg', 'barang', 'kd_brg', 'CASCADE');
        $this->forge->addForeignKey('id_pelanggan', 'penjualan', 'id_pelanggan', 'CASCADE');
        $this->forge->addForeignKey('id_stok', 'stok', 'id_stok', 'CASCADE');
        $this->forge->addForeignKey('id_merek', 'merek', 'id_merek', 'CASCADE');
        $this->forge->createTable('pengeluaran');
    }
    
    public function down()
    {
        $this->forge->dropTable('pengeluaran');
    }
}
