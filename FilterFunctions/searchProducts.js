function searchProducts() {
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const categoryForm = document.getElementById('categoryForm');
    const minPrice = parseFloat(document.getElementById('minPrice').value);
    const maxPrice = parseFloat(document.getElementById('maxPrice').value);
    const selectedCategories = Array.from(categoryForm.querySelectorAll('input[name="category"]:checked')).map(checkbox => checkbox.value);
    
    fetch('../backend/fetchProducts.php')
        .then(response => response.json())
        .then(data => {
            const filteredProducts = filterProducts(data, searchInput, minPrice, maxPrice, selectedCategories);
            updateProducts(filteredProducts);
        })
        .catch(error => {
            console.error('Error fetching products:', error);
        });
}


function filterProducts(data, searchInput, minPrice, maxPrice, selectedCategories) {
    if (selectedCategories.length === 0) {
        return [];
    }

    if (selectedCategories.includes("all")) {
        return data.filter(product =>
            product.productName.toLowerCase().includes(searchInput) &&
            (!minPrice || product.newPrice >= minPrice) &&
            (!maxPrice || product.newPrice <= maxPrice)
        );
    }

    return data.filter(product =>
        selectedCategories.includes(product.category) &&
        product.productName.toLowerCase().includes(searchInput) &&
        (!minPrice || product.newPrice >= minPrice) &&
        (!maxPrice || product.newPrice <= maxPrice)
    );
}


function updateProducts(filteredProducts) {
    productsContainer.innerHTML = '';

    if (filteredProducts.length === 0) {
        const noResultsMessage = document.createElement('p');
        noResultsMessage.textContent = 'No results found.';
        productsContainer.appendChild(noResultsMessage);
    } else {
        filteredProducts.forEach((product, index) => {
            const productCard = document.createElement('div');
            productCard.className = 'productCard';
            productCard.innerHTML = `
                <div class="product">
                    <img src="${product.imageLink}" alt="${product.productName}">
                    <h3>${product.productName}</h3>
                    <div class="productPrice">
                        <div class="product-grid">
                            <p class="prevPrice">₹${product.prevPrice}</p>
                        </div>
                        <div>
                            <p class="product-price">₹${product.newPrice}</p>
                        </div>
                    </div>
                    <p>Catgeory: ${product.category}</p>
                    <p><a href="${product.link}" target="_blank">View Details</a></p>
                </div>
            `;

            productsContainer.appendChild(productCard);

            if ((index + 1) % 3 === 0) {
                productCard.style.marginRight = '0';
            }
        });
    }
}
