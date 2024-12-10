<?php
namespace App\Controllers;

class Admin extends BaseController {
    public function index() {
        return view('admin_panel');
    }
}
?>
