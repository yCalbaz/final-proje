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
        
            return view('tema/header').view('sayfalar/login').view('tema/footer');
        
        
    }
}