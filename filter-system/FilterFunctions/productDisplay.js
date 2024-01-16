const productsContainer = document.querySelector('.products');
data.forEach((product, index) => {
    const productCard = document.createElement('div');
    productCard.className = 'productCard';
    productCard.innerHTML = `
        <div class="product">
            <img src="${product.img}" alt="${product.title}">
            <h3>${product.title}</h3>
            <p>${product.star} ${product.reviews}</p>
            <p class="prevPrice">${product.prevPrice}</p>
            <p>${product.newPrice}</p>
            <p>Company: ${product.company}</p>
            <p>Color: ${product.color}</p>
            <p>Catgeory: ${product.category}</p>
        </div>
    `;
    productsContainer.appendChild(productCard);
    if ((index + 1) % 3 === 0) {
        productCard.style.marginRight = '0';
    }
});