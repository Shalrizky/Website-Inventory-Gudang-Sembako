<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kd_brg' => [
                'type' => 'CHAR',
                'constraint' => 5,
            ],
            'id_merek' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_brg' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'gambar_brg' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],

        ]);

        $this->forge->addKey('kd_brg', true);
        $this->forge->addForeignKey('id_merek', 'merek', 'id_merek', 'CASCADE'); // onDelete CASCADE
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
