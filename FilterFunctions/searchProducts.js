function searchProducts() {
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const categoryForm = document.getElementById('categoryForm');
    const minPrice = parseFloat(document.getElementById('minPrice').value);
    const maxPrice = parseFloat(document.getElementById('maxPrice').value);
    
    if (categoryForm) {
        const allCategoryCheckbox = document.getElementById('allCategory');
        const selectedCategories = Array.from(categoryForm.querySelectorAll('input[name="category"]:checked')).map(checkbox => checkbox.value);

        if (allCategoryCheckbox.checked) {
            updateProducts(data.filter(product =>
                product.title.toLowerCase().includes(searchInput) &&
                (!minPrice || product.newPrice >= minPrice) &&
                (!maxPrice || product.newPrice <= maxPrice)
            ));
        } else {
            if (selectedCategories.length === 0) {
                productsContainer.innerHTML = '';
                const noResultsMessage = document.createElement('p');
                noResultsMessage.textContent = 'No results found.';
                productsContainer.appendChild(noResultsMessage);
            } else {
                const filteredProducts = data.filter(product =>
                    (selectedCategories.length === 0 || selectedCategories.includes(product.category)) &&
                    product.title.toLowerCase().includes(searchInput) &&
                    (!minPrice || product.newPrice >= minPrice) &&
                    (!maxPrice || product.newPrice <= maxPrice)
                );
                updateProducts(filteredProducts);
            }
        }
    }
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
                    <img src="${product.img}" alt="${product.title}">
                    <h3>${product.title}</h3>
                    <p class="prevPrice">${product.prevPrice}</p>
                    <p>${product.newPrice}</p>
                    <p>Catgeory: ${product.category}</p>
                </div>
            `;

            productsContainer.appendChild(productCard);

            if ((index + 1) % 3 === 0) {
                productCard.style.marginRight = '0';
            }
        });
    }
}