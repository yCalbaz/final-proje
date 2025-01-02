<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('anasayfa.php');
    }
    public function login()
    {
        
            return view('auth/login.php');
        
        
    }

    public function uyeol()
    {
        
            return view('auth/uyeol.php');
        
        
    }
    public function hakkimizda()
    {
        
            return view('sayfalar/hakkimizda.php');
        
        
    }
    public function anasayfa()
    {
        
            return view('sayfalar/index.php');
        
        
    }

    public function urun()
    {
        
            return view('sayfalar/urun.php');
        
        
    }

    public function iletisim()
    {
        
            return view('sayfalar/iletisim.php');
        
        
    }
    public function sepet()
    {
        
            return view('sayfalar/sepet.php');
        }
        
}