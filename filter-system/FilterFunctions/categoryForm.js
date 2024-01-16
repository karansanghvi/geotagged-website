function includeCategoryForm() {
    const categoryFormContainer = document.getElementById('categoryFormContainer');
    const categoryFormRequest = new XMLHttpRequest();
    
    categoryFormRequest.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            categoryFormContainer.innerHTML = this.responseText;
            searchProducts();
        }
    };
    
    categoryFormRequest.open('GET', '../SideBar/category.html', true);
    categoryFormRequest.send();
}