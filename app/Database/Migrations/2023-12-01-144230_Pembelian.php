<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembelian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembelian' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_supplier' => [
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
            'tgl_pembelian' => [
                'type' => 'DATE',
            ],
            'jumlah_pembelian' => [
                'type' => 'INT',
                'constraint' => 100,
                'unsigned' => true,
            ],
            'tgl_kadaluarsa_pembelian' => [
                'type' => 'DATE',
                'null' => true,
                'default' => null,
            ],
            'harga_satuan' => [
                'type' => 'INT',
                'constraint' => 100,
                'unsigned' => true,
            ],
            'total_harga' => [
                'type' => 'INT',
                'constraint' => 100,
                'unsigned' => true,
            ],
            'status' => [
                'type' => 'ENUM("In Progress", "Stock In", "Perlu Retur", "Stock Out")',
                'default' => 'In Progress',
            ],

        ]);

        $this->forge->addKey('id_pembelian', true);
        $this->forge->addForeignKey('kd_brg', 'barang', 'kd_brg', 'CASCADE');
        $this->forge->addForeignKey('id_supplier', 'supplier', 'id_supplier', 'CASCADE');
        $this->forge->addForeignKey('id_stok', 'stok', 'id_stok', 'CASCADE'); 
        $this->forge->addForeignKey('id_merek', 'merek', 'id_merek', 'CASCADE');
        $this->forge->createTable('pembelian');
    }

    public function down()
    {
        $this->forge->dropTable('pembelian');
    }
}
