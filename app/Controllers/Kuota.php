<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KuotaModel;
use CodeIgniter\API\ResponseTrait;

class Kuota extends BaseController {
    use ResponseTrait;

    var $meta = [
        'url' => 'kuota',
        'title' => 'Tahap BSM',
        'subtitle' => 'Tahap BSM'
    ];

    public function __construct() {
        $this->kuotaModel = new KuotaModel();
    }

    public function index() {
        $data = [
            'meta' => $this->meta,
            'title' => 'Tahap BSM'
        ];

        return view("kuota/index", $data);
    }

    public function table() {
        $data = [
            'title' => 'Tahap BSM',
            'url'   => $this->meta['url'],
            'dataKuota' => $this->kuotaModel->findAll()
        ];

        return view('/kuota/table', $data);
    }

    public function tambah() {
        $data = [
            'title' => 'Tambah Tahap BSM',
            'url'   => $this->meta['url']
        ];

        return view('/kuota/tambah', $data);
    }

    public function edit($id) {
        $data = [
            'title' => 'Tahap BSM',
            'kuota'  => $this->kuotaModel->find($id),
            'meta'      => $this->meta
        ];

        return view('/kuota/edit', $data);
    }


    public function store() {
        $data = $this->request->getPost();
        $this->kuotaModel->save($data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data Berhasil Ditambahkan.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }


    public function update($id) {
        $data = $this->request->getPost();
        $this->kuotaModel->update($id, $data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data berhasil Diupdate.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }

    public function delete($id) {
        $this->kuotaModel->delete($id);

        $res = [
            'status'    => 'success',
            'msg'     => 'Data berhasil dihapus.',
        ];

        return $this->respond($res, 200);
    }
}
