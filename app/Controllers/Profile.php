<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Profile extends BaseController {
    var $meta = [
        'title'     => 'Profile',
        'subtitle'  => 'Halaman Profile',
        'url'       => 'profile',
    ];

    public function index() {
        $data = [
            'meta' => $this->meta,
            "title" => 'Halaman Profile',
        ];

        return view("profile/index", $data);
    }
}
