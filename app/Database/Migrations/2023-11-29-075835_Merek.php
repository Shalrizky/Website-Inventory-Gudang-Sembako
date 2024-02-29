<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Merek extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_merek' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_merek' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'deskripsi_merek' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_merek', true);
        $this->forge->createTable('merek');
    }

    public function down()
    {
        $this->forge->dropTable('merek');
    }
}
