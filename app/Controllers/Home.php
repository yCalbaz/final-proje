<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('anasayfa');
    }
    public function login()
    {
        
            return view('auth/login');
        
        
    }

    public function uyeol()
    {
        
            return view('auth/uyeol');
        
        
    }
    public function hakkimizda()
    {
        
            return view('sayfalar/hakkimizda');
        
        
    }
    public function anasayfa()
    {
        
            return view('sayfalar/index');
        
        
    }

    public function urun()
    {
        
            return view('sayfalar/urun');
        
        
    }

    public function iletisim()
    {
        
            return view('sayfalar/iletisim');
        
        
    }
    public function sepet()
    {
        
            return view('sayfalar/sepet');
        }


        public function checkoutSuccess()
{
    return view('sayfalar/checkout_success'); // Başarı sayfası
}

        
}