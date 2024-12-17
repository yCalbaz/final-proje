<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetici Paneli</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
</head>
<body>
    <div class="container">
        <h1>Ürün Yönetimi</h1>

        <!-- Ürün Ekleme Formu -->
        <form id="product-form" enctype="multipart/form-data" method="POST" action="http://localhost:3000/urun">
            <input type="text" id="id" name="id" placeholder="Ürün ID" required>
            <input type="text" id="ad" name="ad" placeholder="Ürün Adı" required>
            <input type="text" id="marka" name="marka" placeholder="Ürün Marka" required>
            <input type="text" id="adet" name="adet" placeholder="Ürün Adet" required>
            <input type="text" id="fiyat" name="fiyat" placeholder="Ürün Fiyatı" required>
            <input type="file" id="resim" name="resim" required>
            <button type="submit">Ürün Ekle</button>
        </form>

        <!-- Ürün Güncelleme Formu -->
        <h2>Ürün Güncelleme</h2>
        <form id="update-form" method="POST" action="http://localhost:3000/urun/" enctype="application/x-www-form-urlencoded">
            <input type="text" id="update-id" name="id" placeholder="Ürün ID" required >
            <input type="text" id="update-ad" name="ad" placeholder="Yeni Ürün Adı">
            <input type="text" id="update-marka" name="marka" placeholder="Yeni Ürün Marka">
            <input type="text" id="update-adet" name="adet" placeholder="Yeni Ürün Adet">
            <input type="text" id="update-fiyat" name="fiyat" placeholder="Yeni Ürün Fiyatı">
            <input type="hidden" name="_method" value="PATCH">
            <button type="submit">Ürün Güncelle</button>
        </form>

        <!-- Ürün Silme Formu -->
        <h2>Ürün Silme</h2>
        <form id="delete-form">
            <input type="text" id="delete-id" name="id" placeholder="Ürün ID" required>
            <button type="submit">Ürün Sil</button>
        </form>

        <!-- Ürün Listeleme Butonu ve Listesi -->
        <h2>Ürün Listesi</h2>
        <button id="list-products">Ürünleri Listele</button>
        <div id="product-list"></div>
    </div>

    <script>
        // Ürünleri listeleme
        document.getElementById('list-products').addEventListener('click', function() {
            fetch('http://localhost:3000/urunler')
                .then(response => response.json())
                .then(data => {
                    const productList = document.getElementById('product-list');
                    productList.innerHTML = ''; // Mevcut listeyi temizle
                    data.forEach(urun => {
                        const productItem = document.createElement('div');
                        productItem.classList.add('product-item');
                        productItem.innerHTML = `
                            <p>Ürün ID: ${urun.id}</p>
                            <p>Ürün Adı: ${urun.ad}</p>
                            <p>Ürün Marka: ${urun.marka}</p>
                            <p>Ürün Adet: ${urun.adet}</p>
                            <p>Ürün Fiyatı: ${urun.fiyat}</p>
                            <button class="update-btn" data-id="${urun.id}">Güncelle</button>
                        `;
                        productList.appendChild(productItem);
                    });

                    // Güncelleme butonuna tıklama işlemi
                    const updateBtns = document.querySelectorAll('.update-btn');
                    updateBtns.forEach(button => {
                        button.addEventListener('click', (e) => {
                            const urunId = e.target.dataset.id;
                            showUpdateForm(urunId); // Güncelleme formunu doldur
                        });
                    });
                })
                .catch(error => console.error('Ürünler alınamadı:', error));
        });

        // Güncelleme formunu doldur
        function showUpdateForm(id) {
            fetch(`http://localhost:3000/urun/${id}`)
                .then(response => response.json())
                .then(urun => {
                    document.getElementById('update-id').value = urun.id;
                    document.getElementById('update-ad').value = urun.ad;
                    document.getElementById('update-marka').value = urun.marka;
                    document.getElementById('update-adet').value = urun.adet;
                    document.getElementById('update-fiyat').value = urun.fiyat;
                });
        }

        // Ürün Güncelleme Formunu Gönderme
        document.getElementById('update-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const id = document.getElementById('update-id').value;
            const ad = document.getElementById('update-ad').value;
            const marka = document.getElementById('update-marka').value;
            const adet = document.getElementById('update-adet').value;
            const fiyat = document.getElementById('update-fiyat').value;

            fetch(`http://localhost:3000/urun/${id}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json' charset=utf-8,
                },
                body: JSON.stringify({
                   ad: ad,
                   marka: marka,
                   adet: adet,
                   fiyat: fiyat
                })
            })
            .then(response => response.json())
            .then(data => {
                alert('Ürün başarıyla güncellendi');
                location.reload(); // Sayfayı yenileyerek güncellenen ürünü listele
            })
            .catch(error => console.error('Guncelleme hatasi:', error));
        });

        // Ürün Silme işlemi
        document.getElementById('delete-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const id = document.getElementById('delete-id').value;

            fetch(`http://localhost:3000/urun/${id}`, {
                method: 'DELETE'
            })
            .then(response => response.json())
            .then(data => {
                alert('Ürün başarıyla silindi');
                location.reload(); // Sayfayı yenileyerek silinen ürünü listeden kaldır
            })
            .catch(error => console.error('Silme hatası:', error));
        });

        
    </script>
</body>
</html>
