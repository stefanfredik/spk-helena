<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use CodeIgniter\API\ResponseTrait;

class Datasiswa extends BaseController {
    use ResponseTrait;

    var $meta = [
        'url' => 'datasiswa',
        'title' => 'Data Siswa',
        'subtitle' => 'Halaman Siswa'
    ];


    public function __construct() {
        $this->siswaModel = new SiswaModel();
    }

    public function index() {

        $data = [
            'title' => 'Data Siswa',
            'meta'   => $this->meta,
            'meta'  => $this->meta
        ];

        return view('/siswa/index', $data);
    }

    public function tambah() {
        $data = [
            'title' => 'Tambah Data Siswa',
            'meta'   => $this->meta
        ];

        return view('/siswa/tambah', $data);
    }

    public function table() {
        $data = [
            'title' => 'Data Siswa',
            'meta'   => $this->meta,
            'dataSiswa' => $this->siswaModel->findAll(),
        ];

        return view('/siswa/table', $data);
    }



    public function edit($id) {
        $data = [
            'title' => 'Edit Data Siswa',
            'siswa'  => $this->siswaModel->find($id),
            'meta'      => $this->meta
        ];

        return view('/siswa/edit', $data);
    }



    public function detail($id) {
        $data = [
            'title' => 'Detail Data Penduduk',
            'siswa'  => $this->siswaModel->find($id),
            'meta'   => $this->meta
        ];

        return $this->respond(view('/siswa/detail', $data), 200);
    }

    public function store() {
        $data = $this->request->getPost();
        $this->siswaModel->save($data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data Siswa Berhasil Ditambahkan.',
            // 'data'  => $data
        ];

        return $this->respond($res, 200);
    }

    public function update($id) {
        $data = $this->request->getPost();
        $this->siswaModel->update($id, $data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data berhasil Diupdate.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }

    public function delete($id) {
        $this->siswaModel->delete($id);

        $res = [
            'status'    => 'success',
            'msg'     => 'Data berhasil dihapus.',
        ];

        return $this->respond($res, 200);
    }
}
