<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kelayakan extends Migration {
    public function up() {
        $data = [
            'id' => [
                'type'  => 'INT',
                'auto_increment'    => TRUE
            ],
            'nilai' => [
                'type'  => 'FLOAT',
                'default' => 0
            ],
            'keterangan' => [
                'type'  => 'ENUM',
                'constraint' => ['Layak', 'Cukup Layak', 'Tidak Layak']
            ],
        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kelayakan');
    }

    public function down() {
        $this->forge->dropTable('kelayakan');
    }
}
