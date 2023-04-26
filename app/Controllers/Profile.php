<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;

class Profile extends BaseController
{
    var $meta = [
        'title'     => 'Profile',
        'subtitle'  => 'Halaman Profile',
        'url'       => 'profile',
    ];

    public function __construct()
    {
        $this->userModel = new Users();
    }

    public function index()
    {
        $data = [
            'meta' => $this->meta,
            "title" => 'Halaman Profile',
            'user' => $this->userModel->find(user_id())
        ];

        return view("profile/index", $data);
    }
}
