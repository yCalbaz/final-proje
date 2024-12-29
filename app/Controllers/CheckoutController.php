<?php
namespace App\Controllers;
use App\Models\OrderModel;
use App\Models\CartModel;

class CheckoutController extends BaseController
{
    public function indexxx()
    {
        // Sepet verisini al
        $cartModel = new CartModel();
        $cartItems = $cartModel->findAll();

        // Toplam tutarı hesapla
        $totalAmount = 0;
        foreach ($cartItems as $item) {
            $productModel = new \App\Models\ProductModel();
            $product = $productModel->find($item['product_id']);
            $totalAmount += $product['fiyat'] * $item['adet'];  // Fiyat * Adet
        }

        // Ödeme sayfasını ve toplam tutarı gönder
        return view('sayfalar/checkout', ['totalAmount' => $totalAmount]);
    }

    public function submit()
    {
        // Formdan gelen verileri al
        $data = $this->request->getPost();

        // OrderModel'i başlat
        $orderModel = new OrderModel();

        // Siparişi veritabanına ekle
        $orderModel->insert([
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'address' => $data['address'],
            'payment_method' => $data['payment_method'],
            'notes' => $data['notes'],
        ]);

        // Siparişin başarıyla alındığını bildir
        return redirect()->to('/checkout/success');
    }

    public function success()
    {
        return view('sayfalar/checkout_success');  // Başarı sayfasını yükleyin
    }
}
