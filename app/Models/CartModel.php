<?php
namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    $cartModel->insert([
        'product_id' => $product_id,
        'product_name' => $product_name,
        'price' => $price,
        'quantity' => $quantity,
    ]);
    

    // Gerekirse ek ayarlar ve validation eklenebilir
}
