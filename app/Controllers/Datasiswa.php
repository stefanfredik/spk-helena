<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use CodeIgniter\API\ResponseTrait;
use PhpOffice\PhpSpreadsheet\IOFactory;

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
            'title' => 'Tabel Siswa',
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

    public function upload() {
        $data = [
            'title' => 'Upload Data Siswa dari File Excel',
            'meta'   => $this->meta
        ];

        return view('/siswa/upload', $data);
    }

    public function table() {
        $data = [
            'title' => 'Tabel Siswa',
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

    public function doupload() {
        if (!$this->request->getFile('excel_file')->isValid()) {
            return $this->failValidationErrors("Gagal mengupload data");
        }

        try {
            $excelFile = IOFactory::load($this->request->getFile('excel_file')->getTempName());
            $sheet = $excelFile->getActiveSheet();
            $data = $sheet->toArray();
        } catch (\Throwable $th) {
            $res = [
                'status' => 'error',
                'msg'   => 'Data Gagal di Upload',
            ];

            return $this->respond($res, 500);
        }


        $res = [
            'status' => 'success',
            'msg'   => 'Data Siswa Berhasil Di Upload.',
            'data'  => $data
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
