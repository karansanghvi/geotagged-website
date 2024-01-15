function includeSearchBar() {
    const searchBarContainer = document.getElementById('searchBarContainer');
    const searchbarRequest = new XMLHttpRequest();
    
    searchbarRequest.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            searchBarContainer.innerHTML = this.responseText;
        }
    };
    
    searchbarRequest.open('GET', 'SearchBar/searchBar.html', true);
    searchbarRequest.send();
}