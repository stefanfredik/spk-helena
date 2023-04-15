<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Datasiswa extends Migration
{
    public function up()
    {
        $data = [
            'id' => [
                'type'  => 'INT',
                'auto_increment' => true
            ],
            'id_user' => [
                'type'  => 'INT',
            ],
            'nisn' => [
                'type' => 'VARCHAR',
                'constraint' => 32
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],
            'tanggal_lahir' => [
                'type' => 'DATE'
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],
            'kelas' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],
            'nama_orangtua' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ]
        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->createTable('siswa');
    }

    public function down()
    {
        $this->forge->dropTable('siswa');
    }
}
