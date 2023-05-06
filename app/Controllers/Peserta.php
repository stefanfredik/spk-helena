<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;
use App\Models\PesertaModel;
use App\Models\SiswaModel;
use App\Models\SubkriteriaModel;
use CodeIgniter\API\ResponseTrait;

class Peserta extends BaseController
{
    use ResponseTrait;
    var $meta = [
        'url' => 'datapeserta',
        'title' => 'Data Peserta',
        'subtitle' => 'Halaman Peserta'
    ];


    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
        $this->siswaModel = new SiswaModel();
        $this->kriteriaModel = new KriteriaModel();
        $this->subKriteriaModel = new SubkriteriaModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Data Peserta',
            'meta'   => $this->meta,
        ];

        return view('/peserta/index', $data);
    }

    public function table()
    {
        $data = [
            'title' => 'Data Data Peserta',
            'meta'   => $this->meta,
            'dataPeserta' => $this->pesertaModel->findAllPeserta()
        ];

        return view('/peserta/table', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Peserta',
            'meta'   => $this->meta,
            'dataSiswa' => $this->siswaModel->findAll(),
            'dataKriteria' => $this->kriteriaModel->findAll(),
            'dataSubkriteria' => $this->subKriteriaModel->findAll(),
            'dataPeserta' => $this->pesertaModel->findAll(),
        ];

        return view('/peserta/tambah', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Peserta',
            'meta'   => $this->meta,
            'dataSiswa' => $this->siswaModel->findAll(),
            'dataKriteria' => $this->kriteriaModel->findAll(),
            'dataSubkriteria' => $this->subKriteriaModel->findAll(),
            'peserta' => $this->pesertaModel->find($id),
        ];

        return view('/peserta/edit', $data);
    }


    public function detail($id)
    {

        $data = [
            'dataKriteria'  => $this->kriteriaModel->findAll(),
            'dataSubkriteria' => $this->subKriteriaModel->findAll(),
            'dataSiswa' => $this->siswaModel->findAll(),
            'peserta' => $this->pesertaModel->findPeserta($id),
            'meta'   => $this->meta
        ];

        // dd($this->pesertaModel->findAllPeserta($id)[0]);

        $data['title'] = 'Detail ' . $data['peserta']['nama_lengkap'];
        return $this->respond(view('/peserta/detail', $data), 200);
    }

    // CRUD


    public function store()
    {
        $data = $this->request->getPost();
        $this->pesertaModel->save($data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data Peserta Berhasil Ditambahkan.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $this->pesertaModel->update($id, $data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data Berhasil Diupdate.',
        ];

        return $this->respond($res, 200);
    }


    public function delete($id)
    {
        $this->pesertaModel->delete($id);
        $res = [
            'status'    => 'success',
            'msg'     => 'Data berhasil dihapus.',
        ];

        return $this->respond($res, 200);
    }
}
