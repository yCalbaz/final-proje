<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPanel extends CI_Controller {

    public function index() {
        // Ana yönetici paneli sayfasını yükleyin
        $this->load->view('admin_panel');
    }

    public function urun_ekle() {
        $this->load->view('urun_ekle');
    }

    public function urun_listele() {
        // Node.js API'den ürünleri çekin
        $api_url = 'http://localhost:3000/urun';
        $urunler = json_decode(file_get_contents($api_url), true);
        $data['urunler'] = $urunler;
        $this->load->view('urun_listele', $data);
    }
}
