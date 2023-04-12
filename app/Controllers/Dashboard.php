<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController {
    var $meta = [
        "url"   => 'dashboard',
        "title" => "Dashboard",
        "subtitle" => "Halaman Dashboard"
    ];

    public function index() {
        $data = [
            'meta' => $this->meta,
            'title' => 'Halaman Dashboard',
        ];

        return view("dashboard/index", $data);
    }
}
