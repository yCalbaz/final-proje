<?php
namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart';  // Sepet tablosu
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_id', 'adet'];

    public function addProductToCart($product)
    {
        // Sepette bu ürün var mı kontrol et
        $existingCartItem = $this->where('product_id', $product['id'])->first();
        
        if ($existingCartItem) {
            // Eğer ürün varsa miktarı güncelle
            $this->update($existingCartItem['id'], ['adet' => $existingCartItem['adet'] + 1]);
        } else {
            // Yeni ürün ekle
            $this->save(['product_id' => $product['id'], 'adet' => 1]);
        }
    }


    public function getCartDetails()
{
    $db = \Config\Database::connect();
    $builder = $db->table('cart');
    $builder->select('cart.id as cart_id, cart.adet, products.id as product_id, products.ad, products.marka, products.fiyat, products.resim');
    $builder->join('products', 'cart.product_id = products.id');
    $query = $builder->get();

    return $query->getResultArray(); // Sonuçları dizi olarak döndür
}

    public function getCartItems()
    {
        // Sepetteki tüm ürünleri al
        return $this->findAll();
    }

}
