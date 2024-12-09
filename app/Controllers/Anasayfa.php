<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfa extends CI_Controller {

    public function index()
    {
        // Anasayfa görünümünü yükle
        $this->load->view('anasayfa'); 
    }
}
