const productsContainer = document.querySelector('.products');

fetch('../backend/fetchProducts.php')
    .then(response => response.json())
    .then(data => {
        data.forEach((product, index) => {
            const productCard = document.createElement('div');
            productCard.className = 'productCard';
            productCard.innerHTML = `
                <div class="product">
                    <img src="${product.imageLink}" alt="${product.productName}">
                    <h3>${product.productName}</h3>
                    <div>
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
    })
    .catch(error => {
        console.error('Error fetching products:', error);
    });
