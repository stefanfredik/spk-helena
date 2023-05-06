<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kuota extends Migration
{
    public function up()
    {
        $data = [
            'id' => [
                'type'  => 'INT',
                'auto_increment'    => TRUE
            ],

            'tahun' => [
                'type'  => 'INT',
                'constraint'    => '4',
            ],

            'periode' => [
                'type'  => 'VARCHAR',
                'constraint'    => '64'
            ],
            'jumlah_kuota' => [
                'type'  => 'INT',
            ],

            'tanggal_terima' => [
                'type'  => 'DATE',
            ],

            'keterangan' => [
                'type'  => 'VARCHAR',
                'constraint'    => '64',
                'null' => true
            ],

        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kuota');
    }

    public function down()
    {
        $this->forge->dropTable('kuota');
    }
}
