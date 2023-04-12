<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'siswa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'id_user', 'nisn', 'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'kelas', 'nama_orangtua', 'jumlah_tanggungan', 'telepon', 'alamat'];


    public function findAllData() {
        $this->select('siswa.*');
        $this->select('kriteriasiswa.*', 'kriteriasiswa.id as Kri');
        $this->join('kriteriasiswa', 'siswa.id = kriteriasiswa.id_siswa', 'left', 'siswa.id as pend');
        return $this->findAll();
    }

    public function findAllNonBantuan() {
        $this->select("siswa.*");
        // $this->select("datablt.*");
        $this->join("peserta", "peserta.id_siswa = siswa.id", "left")->where("peserta.id", NULL);
        return $this->findAll();
    }


    public function findAllsiswa() {
        $this->select("siswa.*");
        $this->select("peserta.id_siswa as peserta");
        $this->join("peserta", "peserta.id_siswa = siswa.id", "left");
        return $this->findAll();
    }
}
