const nbrpage = document.querySelectorAll('.nbrpage');
const urlpage = window.location.search;

const searchUrl = new URLSearchParams(urlpage);

for (let i = 0; i < nbrpage.length; i++) {
    j = i+1;
    searchUrl.set('p', j);
    nbrpage[i].href = 'search?' + searchUrl.toString();
}