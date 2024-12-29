<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table      = 'orders';  // Siparişleri tutacak tablonun adı
    protected $primaryKey = 'id';  // Anahtar sütunu (genellikle 'id')

    protected $allowedFields = ['fullname', 'email', 'address', 'payment_method', 'notes'];  // Kaydedilecek alanlar

    // Eğer zaman damgası eklemek istiyorsanız:
    protected $useTimestamps = true;  // Oluşturulma ve güncellenme zamanlarını otomatik tutar
}
