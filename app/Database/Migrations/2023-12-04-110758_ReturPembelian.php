<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ReturPembelian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_retur_pembelian' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_pembelian' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
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
                'type' => 'ENUM("Perlu Retur", "Stock Out")',
                'default' => 'Perlu Retur',
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
        ]);

        $this->forge->addKey('id_retur_pembelian', true);
        $this->forge->addForeignKey('kd_brg', 'barang', 'kd_brg', 'CASCADE');
        $this->forge->addForeignKey('id_pembelian', 'pembelian', 'id_pembelian', 'CASCADE');
        $this->forge->addForeignKey('id_supplier', 'supplier', 'id_supplier', 'CASCADE');
        $this->forge->addForeignKey('id_stok', 'stok', 'id_stok', 'CASCADE'); 
        $this->forge->createTable('retur_pembelian');
    }

    public function down()
    {
        $this->forge->dropTable('retur_pembelian');
    }
}
