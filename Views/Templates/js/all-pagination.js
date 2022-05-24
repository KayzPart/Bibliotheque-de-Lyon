const nbrpage = document.querySelectorAll('.nbrpage');
const urlpage = window.location.search;

const pageUrl = new URLSearchParams(urlpage);

for (let i = 0; i < nbrpage.length; i++) {
    j = i+1;
    pageUrl.set('p', j);
    nbrpage[i].href = '' + pageUrl.toString();
}