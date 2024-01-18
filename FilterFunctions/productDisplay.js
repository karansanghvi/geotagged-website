const productsContainer = document.querySelector('.products');
data.forEach((product, index) => {
    const productCard = document.createElement('div');
    productCard.className = 'productCard';
    productCard.innerHTML = `
    <div class="product">
                    <img src="${product.img}" alt="${product.title}">
                    <h3>${product.title}</h3>
                    <div>
                        <div class="product-grid">
                            <p class="prevPrice">${product.prevPrice}</p>
                        </div>
                        <div>
                            <p class="product-price">${product.newPrice}</p>
                        </div>
                    </div>
                    <p>Catgeory: ${product.category}</p>
                </div>
    `;
    productsContainer.appendChild(productCard);
    if ((index + 1) % 3 === 0) {
        productCard.style.marginRight = '0';
    }
});
