<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('hakkimizda.php');
    }
    public function login()
    {
        
            return view('tema/header').view('sayfalar/login').view('tema/footer');
        
        
    }
}
