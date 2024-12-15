<?php
namespace App\Controllers;
class Anasayfa extends BaseController
{
    public function index()
    {
        return view('tema/header').view('anasayfa').view('tema/footer');
    }
    public function login()
    {
        $session = session();
        if($session->has('durum') && $session->get('durum'))
        {
            return redirect()->to(base_url('login'));
        }
        else
        {
            return view('tema/header').view('sayfalar/login').view('tema/footer');
        }
        
    }
}