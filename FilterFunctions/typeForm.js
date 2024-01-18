function includeTypeForm() {
    const typeFormContainer = document.getElementById('typeFormContainer');
    const typeFormRequest = new XMLHttpRequest();
    
    typeFormRequest.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            typeFormContainer.innerHTML = this.responseText;
            searchProducts();
        }
    };
    
    typeFormRequest.open('GET', '../SideBar/type.html', true);
    typeFormRequest.send();
}