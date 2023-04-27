<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Upload extends BaseController {
    public function index() {
        return view('upload/index');
    }

    public function process() {
        // Memeriksa apakah file Excel sudah diupload
        if (!$this->request->getFile('excel_file')->isValid()) {
            return 'File Excel tidak valid';
        }

        // Membaca file Excel
        $excelFile = IOFactory::load($this->request->getFile('excel_file')->getTempName());
        $sheet = $excelFile->getActiveSheet();



        // $worksheet = $sheet->getActiveSheet();

        // Convert the data to an array
        $data = $sheet->toArray();

        print_r($data);

        // // Memasukkan data dari file Excel ke database
        // $db = db_connect();

        // foreach ($sheet->getRowIterator() as $row) {
        //     $data = $row->toArray();

        //     $db->table('table_name')->insert(['column_name' => $data[0]]);
        // }

        // // Menampilkan pesan berhasil
        // return 'File Excel berhasil diupload';
    }
}
