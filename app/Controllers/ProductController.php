<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CartModel;

class ProductController extends BaseController
{

    
    // Ürünleri listeleme
    public function listProducts()
    {
        $productModel = new ProductModel(); // ProductModel'i başlat
        $products = $productModel->findAll(); // Tüm ürünleri al

        // Veriyi view'e gönder
        return view('sayfalar/urun', ['products' => $products]);
    }
    

}
