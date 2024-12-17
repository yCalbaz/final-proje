document.getElementById('product-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Formun varsayılan submit davranışını engelle

    // Form verilerini alalım
    const formData = new FormData();
    formData.append('id', document.getElementById('id').value);
    formData.append('ad', document.getElementById('ad').value);
    formData.append('marka', document.getElementById('marka').value);
    formData.append('adet', document.getElementById('adet').value);
    formData.append('fiyat', document.getElementById('fiyat').value);
    formData.append('resim', document.getElementById('resim').files[0]); // Resim dosyasını ekle

    // AJAX isteği
    fetch('http://localhost:3000/urun', {
        method: 'POST',
        body: formData, // Form verilerini gönder
    })
    .then(response => response.json()) // JSON formatında cevap al
    .then(data => {
        console.log('Success:', data);
        alert('Ürün başarıyla eklendi.'); // Başarılıysa mesaj göster
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Bir hata oluştu: ' + error.message); // Hata durumunda mesaj göster
    });
});

document.getElementById('update-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Formun varsayılan davranışını engelleyin

    const id = document.getElementById('update-id').value; // Güncellemek istediğiniz ürünün ID'si
    const formData = {
        ad: document.getElementById('update-ad').value,
        marka: document.getElementById('update-marka').value,
        adet: document.getElementById('update-adet').value,
        fiyat: document.getElementById('update-fiyat').value,
    };

    // PATCH isteğini gönder
    fetch(`http://localhost:3000/urun/${id}`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            ad: document.getElementById('update-ad').value,
            marka: document.getElementById('update-marka').value,
            adet: document.getElementById('update-adet').value,
            fiyat: document.getElementById('update-fiyat').value,
        }),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        alert('Ürün başarıyla güncellendi.');
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Bir hata oluştu: ' + error.message);
    });
});


document.getElementById('delete-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Formun varsayılan submit davranışını engelle

    const id = document.getElementById('delete-id').value;

    // Silme isteği
    fetch(`http://localhost:3000/urun/${id}`, {
        method: 'DELETE',
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        alert('Ürün başarıyla silindi.');
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Bir hata oluştu: ' + error.message);
    });
});

document.getElementById('list-products').addEventListener('click', function() {
    // Ürün listeleme isteği
    fetch('http://localhost:3000/urun')
    .then(response => response.json())
    .then(data => {
        const productList = document.getElementById('product-list');
        productList.innerHTML = ''; // Önceki listeyi temizle

        if (data.length === 0) {
            productList.innerHTML = 'Hiç ürün bulunmamaktadır.';
        } else {
            data.forEach(urun => {
                const productItem = document.createElement('div');
                productItem.innerHTML = `
                    <strong>${urun.ad}</strong><br>
                    Marka: ${urun.marka}<br>
                    Adet: ${urun.adet}<br>
                    Fiyat: ${urun.fiyat}<br>
                    ${urun.resim ? `<img src="http://localhost:3000/uploads/${urun.resim}" alt="Ürün Resmi" width="100">` : 'Resim yok'}<br><br>
                `;
                productList.appendChild(productItem);
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Ürünler alınırken bir hata oluştu.');
    });
});
