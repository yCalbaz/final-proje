<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products'; // Ürünlerin olduğu tablo adı
    protected $primaryKey = 'id';
    protected $allowedFields = ['ad', 'marka', 'fiyat', 'resim'];


}
