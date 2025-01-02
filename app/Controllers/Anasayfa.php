<?php
namespace App\Controllers;
class Anasayfa extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();

        // Tüm ürünleri çek
        $products = $productModel->findAll();

        // Ana sayfa görünümüne ürünleri gönder
        return view('anasayfa', ['products' => $products]);
    }
    
}