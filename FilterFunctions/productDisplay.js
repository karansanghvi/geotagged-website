const productsContainer = document.querySelector('.products');
data.forEach((product, index) => {
    const productCard = document.createElement('div');
    productCard.className = 'productCard';
    productCard.innerHTML = `
    <div class="product">
        <img src="${product.img}" alt="${product.title}">
        <h3>${product.title}</h3>
        <p class="prevPrice">${product.prevPrice}</p>
        <p>${product.newPrice}</p>
        <p>Catgeory: ${product.categoxry}</p>
        <p>Type: ${product.type}</p>
    </div>
    `;
    productsContainer.appendChild(productCard);
    if ((index + 1) % 3 === 0) {
        productCard.style.marginRight = '0';
    }
});
