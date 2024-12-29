<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CartModel;

class CartController extends BaseController
{
    public function addToCart($productId)
    {
        $productModel = new ProductModel();
        $cartModel = new CartModel();

        // Ürünü al
        $product = $productModel->find($productId);

        // Sepet kontrolü ve ekleme işlemi
        if ($product) {
            // Burada sepette ürün olup olmadığını kontrol edin
            $cartModel->addProductToCart($product);
            return redirect()->to('/sepet')->with('message', 'Ürün sepete eklendi!');
        } else {
            return redirect()->back()->with('error', 'Ürün bulunamadı.');
        }
    }

    public function __construct()
    {
        $this->cartModel = new CartModel();
    }

    public function removeFromCart($cart_id)
    {
        // Sepetteki ürünü sil
        $this->cartModel->deleteItem($cart_id);

        // Silme işleminden sonra sepet sayfasına yönlendir
        return redirect()->to('/sepet')->with('message', 'Ürün başarıyla silindi.');
    }


    public function viewCart()
{
    $cartModel = new CartModel();
    $cartItems = $cartModel->getCartDetails(); // Sepet detaylarını al

    return view('sayfalar/sepet', ['cartItems' => $cartItems]);
}

}
