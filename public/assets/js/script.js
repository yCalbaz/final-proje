const productForm = document.getElementById('product-form');
const updateForm = document.getElementById('update-form');
const deleteForm = document.getElementById('delete-form');
const listButton = document.getElementById('list-products');
const productList = document.getElementById('product-list');

// Ürün ekleme işlevi
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

// Ürün güncelleme işlevi
updateForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const id = document.getElementById('update-id').value;
    const ad = document.getElementById('update-ad').value;
    const marka = document.getElementById('update-marka').value;
    const adet = document.getElementById('update-adet').value;

    const response = await fetch(`http://localhost:3000/urun/${id}`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ ad, marka, adet })
    });
    const responseData = await response.json();
    console.log('Sunucu Yanıtı:', responseData);
    document.location.reload();
});

// Ürün silme işlevi
deleteForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const id = document.getElementById('delete-id').value;

    const response = await fetch(`http://localhost:3000/urun/${id}`, {
        method: 'DELETE'
    });
    const responseData = await response.text();
    console.log('Sunucu Yanıtı:', responseData);
    document.location.reload();
});

// Ürünleri listeleme işlevi
listButton.addEventListener('click', async () => {
    productList.innerHTML = ''; // Mevcut listeyi temizleyin
    const response = await fetch('http://localhost:3000/urun');
    const products = await response.json();
    products.forEach(product => addProductToList(product));
});

// Ürün listeye ekleme işlevi
function addProductToList(product) {
    const productItem = document.createElement('div');
    productItem.className = 'product-item';
    productItem.innerHTML = `
        <h3>${product.ad}</h3>
        <p>Marka: ${product.marka}</p>
        <p>Adet: ${product.adet}</p>
        <button onclick="editProduct('${product.id}', '${product.ad}', '${product.marka}', '${product.adet}')">Düzenle</button>
        <button onclick="deleteProduct('${product.id}')">Sil</button>
    `;
    productList.appendChild(productItem);
}

// Ürün silme işlevi (liste içindeki)
async function deleteProduct(id) {
    await fetch(`http://localhost:3000/urun/${id}`, {
        method: 'DELETE'
    });
    document.location.reload();
}

// Ürün düzenleme işlevi (liste içindeki)
function editProduct(id, ad, marka, adet) {
    document.getElementById('update-id').value = id;
    document.getElementById('update-ad').value = ad;
    document.getElementById('update-marka').value = marka;
    document.getElementById('update-adet').value = adet;
}

// Sayfa yüklendiğinde ürünleri getir
fetchProducts();
