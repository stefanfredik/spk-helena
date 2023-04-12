<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class NotFound extends BaseController {
    public function index() {
        $data = [
            'title' => '404 Not Found'
        ];

        return view("app/404", $data);
    }
}
