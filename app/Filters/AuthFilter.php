<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Kullanıcının giriş yapıp yapmadığını kontrol et
        if (!session()->has('user_id')) {
            // Eğer giriş yapılmamışsa login sayfasına yönlendir
            return redirect()->to('/login')->with('error', 'Bu sayfaya erişim izniniz yok');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // İşlem sonrası yapılacak bir şey yok
    }
}
