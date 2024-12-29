const productList = document.getElementById('product-list');
const updateModal = document.getElementById('update-modal');

// Ürünleri Listele
// Ürünleri Listele 
async function listProducts() {
    const response = await fetch('http://localhost:3000/urunler');
    const products = await response.json();
    productList.innerHTML = '';

    products.forEach(product => {
        const productElement = `
            <div class="product-item">
                <img src="http://localhost:3000/uploads/${product.resim}" alt="${product.ad}">
                <h3>${product.ad}</h3>
                <div class="details">
                    <span>Marka: ${product.marka}</span>
                    <span>Adet: ${product.adet}</span>
                    <span>Fiyat: ${product.fiyat}₺</span>
                </div>
                <button class="update" onclick="openUpdateModal('${product.id}', '${product.ad}', '${product.marka}', '${product.adet}', '${product.fiyat}')">Güncelle</button>
                <button class="delete" onclick="deleteProduct('${product.id}')">Sil</button>
            </div>
        `;
        productList.innerHTML += productElement;
    });
}


// Ürün Sil
async function deleteProduct(id) {
    if (confirm('Bu ürünü silmek istediğinize emin misiniz?')) {
        const response = await fetch(`http://localhost:3000/urun/${id}`, { method: 'DELETE' });
        if (response.ok) {
            alert('Ürün başarıyla silindi');
            listProducts(); // Ürünleri yeniden listele
        } else {
            alert('Ürün silinemedi.');
        }
    }
}

// Güncelleme Modal'ı Açma
function openUpdateModal(id, ad, marka, adet, fiyat) {
    document.getElementById('update-id').value = id;
    document.getElementById('update-ad').value = ad;
    document.getElementById('update-marka').value = marka;
    document.getElementById('update-adet').value = adet;
    document.getElementById('update-fiyat').value = fiyat;
    updateModal.style.display = 'block';
}

// Güncelleme Modal'ı Kapatma
function closeUpdateModal() {
    updateModal.style.display = 'none';
}

document.getElementById('update-form').addEventListener('submit', async (e) => {
  e.preventDefault(); // Sayfanın yenilenmesini engeller

  const id = document.getElementById('update-id').value;  // ID'yi modaldan alıyoruz
  const ad = document.getElementById('update-ad').value;
  const marka = document.getElementById('update-marka').value;
  const adet = document.getElementById('update-adet').value;
  const fiyat = document.getElementById('update-fiyat').value;

  console.log("Güncellenen Ürün Verisi:", { id, ad, marka, adet, fiyat });  // Verileri kontrol et

  const response = await fetch(`http://localhost:3000/urun/${id}`, {
      method: 'PATCH',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ ad, marka, adet, fiyat })
  });

  const responseData = await response.json();  // Yanıtı alıyoruz

  if (response.ok) {
      alert('Ürün başarıyla güncellendi');
      listProducts();  // Güncel ürünleri listele
      closeUpdateModal();  // Modal'ı kapat
  } else {
      alert('Güncelleme işlemi başarısız oldu');
      console.error('Güncelleme hatası:', responseData);
  }
});


// Sayfa Yüklenince Ürünleri Listele
document.addEventListener('DOMContentLoaded', listProducts);
