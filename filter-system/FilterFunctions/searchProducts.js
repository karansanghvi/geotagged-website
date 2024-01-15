function searchProducts() {
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const categoryForm = document.getElementById('categoryForm');
    
    if (categoryForm) {
        const allCategoryCheckbox = document.getElementById('allCategory');
        const selectedCategories = Array.from(categoryForm.querySelectorAll('input[name="category"]:checked')).map(checkbox => checkbox.value);

        if(allCategoryCheckbox.checked){
            updateProducts(data.filter(product => product.title.toLowerCase().includes(searchInput)));
        }
        else{
            if (selectedCategories.length === 0) {
                productsContainer.innerHTML = ''; // Clear the products container
                const noResultsMessage = document.createElement('p');
                noResultsMessage.textContent = 'No results found.';
                productsContainer.appendChild(noResultsMessage);
            } else {
                const filteredProducts = data.filter(product =>
                    (selectedCategories.length === 0 || selectedCategories.includes(product.category)) &&
                    product.title.toLowerCase().includes(searchInput)
                );
                updateProducts(filteredProducts);
            }
        }
    }
}