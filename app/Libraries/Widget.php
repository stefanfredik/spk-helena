<?php

namespace App\Libraries;

class Widget {
    public function tombolAksi($data) {
        return view("cell/aksi", $data);
    }
}
