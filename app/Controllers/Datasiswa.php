<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use CodeIgniter\API\ResponseTrait;


class Datasiswa extends BaseController
{
    use ResponseTrait;

    var $meta = [
        'url' => 'datasiswa',
        'title' => 'Data Siswa',
        'subtitle' => 'Halaman Siswa'
    ];


    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Tabel Siswa',
            'meta'   => $this->meta,
            'meta'  => $this->meta
        ];

        return view('/siswa/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Siswa',
            'meta'   => $this->meta
        ];

        return view('/siswa/tambah', $data);
    }

    public function upload()
    {
        $data = [
            'title' => 'Upload Data Siswa dari File Excel',
            'meta'   => $this->meta
        ];

        return view('/siswa/upload', $data);
    }

    public function table()
    {
        $data = [
            'title' => 'Tabel Siswa',
            'meta'   => $this->meta,
            'dataSiswa' => $this->siswaModel->findAll(),
        ];

        return view('/siswa/table', $data);
    }



    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Siswa',
            'siswa'  => $this->siswaModel->find($id),
            'meta'      => $this->meta
        ];

        return view('/siswa/edit', $data);
    }



    public function detail($id)
    {
        $data = [
            'title' => 'Detail Data Siswa',
            'siswa'  => $this->siswaModel->find($id),
            'meta'   => $this->meta
        ];

        return $this->respond(view('/siswa/detail', $data), 200);
    }

    public function store()
    {
        $data = $this->request->getPost();
        $this->siswaModel->save($data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data Siswa Berhasil Ditambahkan.',
            // 'data'  => $data
        ];

        return $this->respond($res, 200);
    }

    public function doupload()
    {

        $rules = [
            'excel_file' => [
                'rules' => [
                    'ext_in[excel_file,excel,xlsx]'
                ],
                'errors' => [
                    'required' => 'File Belum Diupload.',
                    'ext_in' => 'Jenis File tidak Cocok dengan kriteria.'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return $this->respond([
                'status' => 'error',
                'error' => $this->validation->getError("excel_file")
            ], 400);
        }

        $file = $this->request->getFile("excel_file");
        $fileName = $file->getName();
        $file->move(WRITEPATH . 'uploads/siswa', $fileName, true);
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load(WRITEPATH . 'uploads/siswa/' . $fileName);
        $dataExcel = $spreadsheet->getSheet(0)->toArray();
        array_shift($dataExcel);

        $data  = array();

        foreach ($dataExcel as $t) {
            $dt["nisn"] = $t[0];
            $dt["nama_lengkap"] = $t[1];
            $dt["tempat_lahir"] = $t[2];
            $dt["tanggal_lahir"] = date('Y-m-d', strtotime(str_replace('/', '-', $t[3])));
            $dt["jenis_kelamin"] = ($t[4] == "P" ? "Perempuan" : "Laki-laki");
            $dt["kelas"] = $t[5];
            $dt["nama_orangtua"] = $t[6];
            $dt["alamat"] = $t[7];

            array_push($data, $dt);
        }


        foreach ($data as $dt) {
            $this->siswaModel->save($dt);
        }

        unlink(WRITEPATH . 'uploads/siswa/' . $fileName);

        $res = [
            'status' => 'success',
            'msg'   => 'Data Excel Berhasil di Import.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $this->siswaModel->update($id, $data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data berhasil Diupdate.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }

    public function delete($id)
    {
        $this->siswaModel->delete($id);

        $res = [
            'status'    => 'success',
            'msg'     => 'Data berhasil dihapus.',
        ];

        return $this->respond($res, 200);
    }
}
