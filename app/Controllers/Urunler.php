<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class NodeData extends CI_Controller { 
    
    public function index() { 
        $this->load->view('urunler'); 
        } 
        public function fetch_data() { 
            // Node.js sunucusundan veri çekme 
            $url = 'http://localhost:3000/data'; 
            $json = file_get_contents($url); 
            $data = json_decode($json, true); 
            
            // Veriyi view dosyasına gönderme 
            $this->load->view('urunler', ['urunler' => $data]); 
            } } ?>