const productForm = document.getElementById('product-form');
const productList = document.getElementById('product-list');
const searchInput = document.getElementById('search');

productForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const id = document.getElementById('id').value;
    const ad = document.getElementById('ad').value;
    const marka = document.getElementById('marka').value;
    const adet = document.getElementById('adet').value;

    const response = await fetch('http://localhost:3000/urun', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id, ad, marka, adet })
    });
    const responseData = await response.json();
    console.log('Sunucu Yanıtı:', responseData);
    addProductToList(responseData);
});

async function fetchProducts() {
    const response = await fetch('http://localhost:3000/urun');
    const products = await response.json();
    products.forEach(product => addProductToList(product));
}

function addProductToList(product) {
    const productItem = document.createElement('div');
    productItem.className = 'product-item';
    productItem.innerHTML = `
        <h3>${product.ad}</h3>
        <p>Marka: ${product.marka}</p>
        <p>Adet: ${product.adet}</p>
        <button onclick="deleteProduct('${product.id}')">Sil</button>
        <button onclick="editProduct('${product.id}', '${product.ad}', '${product.marka}', '${product.adet}')">Güncelle</button>
    `;
    productList.appendChild(productItem);
}

async function deleteProduct(id) {
    await fetch(`http://localhost:3000/urun/${id}`, {
        method: 'DELETE'
    });
    document.location.reload();
}

async function editProduct(id, ad, marka, adet) {
    const newAd = prompt("Yeni Ürün Adı:", ad);
    const newMarka = prompt("Yeni Ürün Markası:", marka);
    const newAdet = prompt("Yeni Ürün Adedi:", adet);

    await fetch(`http://localhost:3000/urun/${id}`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ ad: newAd, marka: newMarka, adet: newAdet })
    });
    document.location.reload();
}

searchInput.addEventListener('input', async () => {
    const query = searchInput.value.toLowerCase();
    const response = await fetch('http://localhost:3000/urun');
    const products = await response.json();
    const filteredProducts = products.filter(product => product.ad.toLowerCase().includes(query));
    productList.innerHTML = '';
    filteredProducts.forEach(product => addProductToList(product));
});

fetchProducts();
