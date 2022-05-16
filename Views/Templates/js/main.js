const btnmenu = document.querySelector('.menubg');
const closemenu = document.querySelector('.close');
const menubg = document.querySelector('.menumobile');
const btncontact = document.querySelector('.btncontact');
const contact = document.querySelector('.contact');
const closecontact = document.querySelector('.closec');
const bookpass = document.getElementsByClassName('imgbooks');
const arrowleft = document.querySelector('.left');
const arrowright = document.querySelector('.right');
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
let nbr = 2;
let nbrr = 3;
let nbrl = 1;
bookpass[nbr].classList.add('act');
bookpass[nbr-1].classList.add('left');
bookpass[nbr+1].classList.add('right');

for (let i = 0; i < bookpass.length; i++) {
    const element = bookpass[i];
    if(i < nbrl){
        element.classList.add('lhide');
    }if(i > nbrr){
        element.classList.add('rhide');
    }
}

arrowleft.addEventListener('click', ()=>{
    bookpass[nbr].classList.remove('act');
    bookpass[nbr].classList.add('left');
    bookpass[nbrr].classList.remove('right');
    bookpass[nbrr].classList.add('rhide');
    bookpass[nbrl].classList.remove('lhide');
    bookpass[nbrl].classList.add('left');
    nbrl--;
    nbrr--;
    nbr--;
    if(nbr < 0){
        nbr = bookpass.length-1;
    }
    if(nbrr < 0){
        nbrr = bookpass.length-1;
    }
    if(nbrl < 0){
        nbrl = bookpass.length-1;
    }
    bookpass[nbr].classList.add('act');
})
arrowright.addEventListener('click', ()=>{
    bookpass[nbr].classList.remove('act');
    bookpass[nbr].classList.add('right');
    bookpass[nbrl].classList.remove('left');
    bookpass[nbrl].classList.add('lhide');
    bookpass[nbrr].classList.remove('rhide');
    bookpass[nbrr].classList.add('right');
    nbrl++;
    nbrr++;
    nbr++;
    if(nbr > bookpass.length-1){
        nbr = 0;
    }
    if(nbrr > bookpass.length-1){
        nbrr = 0;
    }
    if(nbrl > bookpass.length-1){
        nbrl = 0;
    }
    bookpass[nbr].classList.add('act');
})

btnmenu.addEventListener('click', ()=>{
    menubg.classList.toggle('show');
})
closemenu.addEventListener('click', ()=>{
    menubg.classList.toggle('show');
})

btncontact.addEventListener('click', ()=>{
    contact.classList.toggle('show');
})
closecontact.addEventListener('click', ()=>{
    contact.classList.toggle('show');
})

