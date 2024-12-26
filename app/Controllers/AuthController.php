<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    // Üye olma formunu göstermek için kullanılan metod
    public function uyeol()
    {
        return view('auth/uyeol');
    }

    // Formdan gelen verileri işlemek için kullanılan metod
    public function register()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'username' => 'required|min_length[3]|max_length[50]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->with('errors', $validation->getErrors());
        }

        $userModel = new UserModel();
        $passwordHash = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);

        $userModel->save([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => $passwordHash,
        ]);

        return redirect()->to('/login')->with('success', 'Kayıt işlemi başarılı. Giriş yapabilirsiniz.');
    }

    // Giriş sayfasını göstermek için metod
    public function login()
    {
        return view('auth/login'); 
    }




    // Kullanıcı girişini işlemek için metod
    public function loginUser()
{
    // Formdan alınan kullanıcı adı ve şifreyi alalım
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    // Kullanıcıyı veritabanında sorgulayalım
    $userModel = new UserModel();
    $user = $userModel->where('username', $username)->first();

    // Kullanıcı bulunursa ve şifre doğruysa
    if ($user && password_verify($password, $user['password'])) {
        // Kullanıcı bilgilerini oturumda sakla
        session()->set([
            'user_id' => $user['id'],  // Kullanıcı ID'sini sakla
            'username' => $user['username'],  // Kullanıcı adını da saklayabilirsiniz
            'is_logged_in' => true,  // Oturumun başarılı olduğunu belirten ek bir değer
        ]);
        
        // Admin paneline yönlendir
        return redirect()->to('/admin');
    } else {
        // Hatalı giriş
        return redirect()->back()->with('error', 'Geçersiz kullanıcı adı veya şifre');
    }
}

}

