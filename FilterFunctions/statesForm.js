function includeStatesForm() {
    const statesFormContainer = document.getElementById('statesFormContainer');
    const statesFormRequest = new XMLHttpRequest();
    
    statesFormRequest.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            statesFormContainer.innerHTML = this.responseText;
            searchProducts();
        }
    };
    
    statesFormRequest.open('GET', '../states.html', true);
    statesFormRequest.send();
}k