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
        $api_url = 'http://127.0.0.1:3000/urunler';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'cURL Hatası: ' . curl_error($ch); // Hata var mı kontrol edin
    exit;
}

curl_close($ch);

// Dönen yanıtı kontrol edin
echo $response;

    }
    
    public function urun_sil($id) {
        $api_url = 'http://localhost:3000/urun/' . $id;
    
        try {
            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_exec($ch);
            curl_close($ch);
    
            redirect('adminpanel/urun_listele');
        } catch (Exception $e) {
            log_message('error', 'Ürün silinemedi: ' . $e->getMessage());
            redirect('adminpanel/urun_listele');
        }
    }
    
    public function urun_guncelle() {
        $api_url = 'http://localhost:3000/urun/' . $this->input->post('id');
        $data = [
            'ad' => $this->input->post('ad'),
            'marka' => $this->input->post('marka'),
            'adet' => $this->input->post('adet'),
            'fiyat' => $this->input->post('fiyat'),
        ];
    
        try {
            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($data))
            ]);
            curl_exec($ch);
            curl_close($ch);
    
            redirect('adminpanel/urun_listele');
        } catch (Exception $e) {
            log_message('error', 'Ürün güncellenemedi: ' . $e->getMessage());
            redirect('adminpanel/urun_listele');
        }
    }
    
    
}