const searchcat = document.getElementById('searchcat');
const cate = document.getElementById('categories');
const searchbar = document.querySelector('.inpsearchbar');

setInterval(() => {
    if(searchcat.value == 'category'){
        cate.classList.add('showit');
        searchbar.classList.add('hideit')
    }else{
        cate.classList.remove('showit');
        searchbar.classList.remove('hideit');
    }
}, 1000);