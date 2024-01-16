function includePriceRange() {
    const priceRangeContainer = document.getElementById('priceRangeContainer');
    const priceRangeRequest = new XMLHttpRequest();
    
    priceRangeRequest.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            priceRangeContainer.innerHTML = this.responseText;
            
            const searchInput = document.getElementById('searchInput');
            const minPriceInput = document.getElementById('minPrice');
            const maxPriceInput = document.getElementById('maxPrice');
            
            searchInput.addEventListener('input', searchProducts);
            minPriceInput.addEventListener('input', searchProducts);
            maxPriceInput.addEventListener('input', searchProducts);

            searchProducts();
        }
    };
    
    priceRangeRequest.open('GET', '../SideBar/price.html', true);
    priceRangeRequest.send();
}