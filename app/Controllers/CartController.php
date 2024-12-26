<?php
namespace App\Controllers;

use App\Models\CartModel;

class CartController extends BaseController
{
    // Sepete ürün ekleme işlevi
    public function addToCart()
{
    $cartModel = new CartModel();

    // POST isteğiyle gelen veriler
    $product_id = $this->request->getPost('product_id');
    $product_name = $this->request->getPost('product_name');
    $price = $this->request->getPost('price');
    $quantity = $this->request->getPost('quantity');
    $session_id = session_id(); // Oturum ID'sini al

    // Sepette aynı ürün varsa güncelle
    $existingItem = $cartModel->where('product_id', $product_id)
                              ->where('session_id', $session_id) // Aynı oturumdaki ürünleri kontrol et
                              ->first();

    if ($existingItem) {
        $cartModel->update($existingItem['id'], [
            'quantity' => $existingItem['quantity'] + $quantity
        ]);
    } else {
        // Yeni ürün ekle
        $cartModel->insert([
            'product_id' => $product_id,
            'product_name' => $product_name,
            'price' => $price,
            'quantity' => $quantity,
            'session_id' => $session_id, // Oturum ID'si ile kaydet
        ]);
    }

    return redirect()->to('/cart')->with('success', 'Ürün sepete eklendi!');
}


public function viewCart()
{
    $cartModel = new CartModel();
    $session_id = session_id(); // Oturum ID'sini al

    // Oturum ID'sine göre sepeti getir
    $cartItems = $cartModel->where('session_id', $session_id)->findAll();

    return view('sayfalar/sepet', ['cartItems' => $cartItems]);
}

}
