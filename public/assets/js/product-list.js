const productList = document.getElementById('product-list');

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
                <button onclick="addToCart('${product.id}')">Sepete Ekle</button>
            </div>
        `;
        productList.innerHTML += productElement;
    });
}

// Sepete Ürün Ekle
function addToCart(productId) {
    alert(`Ürün ${productId} sepete eklendi!`);
}

// Sayfa Yüklendiğinde Ürünleri Listele
document.addEventListener('DOMContentLoaded', listProducts);
