function filterByStates() {
    const productDisplay = document.querySelector('.all-products');
    productDisplay.style.display = 'none';
    const statesFormDisplay = document.querySelector('.statesForm');
    statesFormDisplay.style.display='block'
    const searchBarDisplay = document.querySelector('#searchBarContainer');
    searchBarDisplay.style.display='none';
}