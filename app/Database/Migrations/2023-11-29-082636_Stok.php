<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Stok extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_stok' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kd_brg' => [
                'type' => 'CHAR',
                'constraint' => 5,
            ],
            'status_stok' => [
                'type' => 'ENUM("Banyak", "Kurang", "Habis")',
                'default' => 'Habis',
            ],
            'jumlah_stok' => [
                'type' => 'INT',
                'constraint' => 100,
                'unsigned' => true,
            ],
            'tgl_kadaluarsa' => [
                'type' => 'DATE',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATE',
                'null' => true,
                'default' => null,
            ],
        ]);

        $this->forge->addKey('id_stok', true);
        $this->forge->addForeignKey('kd_brg', 'barang', 'kd_brg', 'CASCADE'); // onDelete CASCADE
        $this->forge->createTable('stok');
    }

    public function down()
    {
        $this->forge->dropTable('stok');
    }
}
