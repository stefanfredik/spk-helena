<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'peserta';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = ['id', 'id_siswa'];

    public function findAllPeserta() {
        $this->select('siswa.*');
        $this->select('peserta.*');
        $this->join('siswa', 'siswa.id = peserta.id_siswa');
        return $this->findAll();
    }

    public function findPeserta($id) {
        $this->select('peserta.id as id_peserta');
        $this->select('siswa.*');
        $this->select('peserta.*');
        $this->join('siswa', 'siswa.id = peserta.id_siswa');
        return $this->find($id);
    }
}
