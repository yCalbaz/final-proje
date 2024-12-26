<?php
namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        // Kullanıcının giriş yapıp yapmadığını kontrol et
        if (!session()->has('user_id')) {
            return redirect()->to('/login')->with('error', 'Lütfen giriş yapın');
        }

        // Eğer giriş yapılmışsa admin panelini göster
        return view('admin_panel');
    }
}


?>
