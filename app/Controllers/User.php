<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;
use CodeIgniter\API\ResponseTrait;
use Myth\Auth\Password;

class User extends BaseController {
    use ResponseTrait;

    var $meta = [
        'url'   => 'user',
        'title' => 'User',
        'subtitle' => 'Halaman User'
    ];



    public function __construct() {
        $this->userModel = new Users();
    }

    public function index() {

        $data = [
            'meta' => $this->meta,
            'title' => 'Data User',
            'userCount' => $this->userModel->countAll()
        ];

        return view("user/index", $data);
    }

    public function tambah() {
        $data = [
            'title' => 'Tambah Data User',
            'url'   => $this->meta['url']
        ];

        return view('/user/tambah', $data);
    }

    public function edit($id) {
        $data = [
            'title' => 'Edit Data User',
            'user'  => $this->userModel->find($id),
            'meta'      => $this->meta,
            'jabatan' =>  $this->userModel->findAllRole()
        ];

        return $this->respond(view('/user/edit', $data), 200);
    }

    public function table() {
        $data = [
            'title' => 'Data User',
            'url'   => $this->meta['url'],
            'dataUser' => $this->userModel->findAll(),
        ];

        return view('/user/table', $data);
    }

    public function store() {
        $rules = [
            'username'  => [
                'rules'  => 'required|is_unique[users.username]',
                'errors' => [
                    'is_unique' => 'Username telah digunakan.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'min_length' => 'Password minimal 8 Digit.'
                ]
            ],
            'password2' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'matches' => 'Password tidak sama.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return $this->respond([
                'status' => 'error',
                'error' => $this->validation->getErrors()
            ], 400);
        }


        $request = $this->request->getPost();

        $data = [
            'nama_user' => $request['nama_user'],
            'username' => $request['username'],
            'password_hash' => Password::hash($request['password']),
            'active'    => "1"
        ];

        $this->userModel->withGroup($request['jabatan'])->save($data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data User Berhasil Ditambahkan.'
        ];

        return $this->respond($res, 200);
    }


    public function update($id) {
        $data = $this->request->getPost();

        $this->userModel->update($id, $data);
        $this->userModel->updateGroup($id, $this->request->getPost("jabatan"));

        $res = [
            'status' => 'success',
            'msg'   => 'Data User Berhasil Diupdate.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }



    public function delete($id) {

        $this->userModel->delete($id);

        $res = [
            'status'    => 'success',
            'msg'     => 'Data berhasil dihapus.',
        ];

        return $this->respond($res, 200);
    }
}
