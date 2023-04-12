<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;
use App\Models\SubkriteriaModel;
use CodeIgniter\API\ResponseTrait;

class Subkriteria extends BaseController {
    use ResponseTrait;

    var $meta = [
        'url' => 'subkriteria',
        'title' => 'Sub Kriteria',
        'subtitle' => 'Halaman Sub Kriteria'
    ];


    public function __construct() {
        $this->subKriteriaModel = new SubkriteriaModel();
        $this->kriteriaModel = new KriteriaModel();
        $this->forge = \Config\Database::forge();
    }


    public function index() {
        $data = [
            'meta' => $this->meta,
            'title' => 'Data Sub Kriteria'
        ];

        return view("/subkriteria/index", $data);
    }


    public function tambah() {
        $data = [
            'title' => 'Tambah Data Sub Kriteria',
            'kriteriaData' => $this->kriteriaModel->findAll(),
            'url'   => $this->meta['url']
        ];

        return view('/subkriteria/tambah', $data);
    }


    public function edit($id) {
        $data = [
            'title' => 'Edit Data Sub Kriteria',
            'data'  => $this->subKriteriaModel->find($id),
            'dataKriteria' => $this->kriteriaModel->findAll(),
            'url'   => $this->meta['url']
        ];

        return $this->respond(view('/subkriteria/edit', $data), 200);
    }

    public function table() {
        $data = [
            'title' => 'Data Sub Kriteria',
            'url'   => $this->meta['url'],
            'dataSubkriteria' => $this->subKriteriaModel->findAllSubkriteria(),
            'dataKriteria' => $this->kriteriaModel->findAll(),
        ];

        return view('/subkriteria/table', $data);
    }


    public function store() {
        $data = $this->request->getPost();
        $this->subKriteriaModel->save($data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data Sub Kriteria Berhasil Ditambahkan.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }


    public function update($id) {
        $data = $this->request->getPost();
        $this->subKriteriaModel->update($id, $data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data  berhasil diupdate.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }


    public function delete($id) {

        $this->subKriteriaModel->delete($id);

        $res = [
            'status'    => 'success',
            'msg'     => 'Data berhasil dihapus.',
        ];

        return $this->respond($res, 200);
    }
}
