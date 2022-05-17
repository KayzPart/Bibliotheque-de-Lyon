const btnmenu = document.querySelector('.menubg');
const closemenu = document.querySelector('.close');
const menubg = document.querySelector('.menumobile');
const btncontact = document.querySelector('.btncontact');
const contact = document.querySelector('.contact');
const closecontact = document.querySelector('.closec');
const bookpass = document.getElementsByClassName('imgbooks');
const arrowright = document.querySelector('.aleft');
const arrowleft = document.querySelector('.aright');
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
let nbrrh = 4;
let nbrlh = 0;
bookpass[nbr].classList.add('act');
bookpass[nbrl].classList.add('left');
bookpass[nbrr].classList.add('right');

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
    bookpass[nbrr].classList.add('act');
    bookpass[nbrl].classList.remove('left');
    bookpass[nbrl].classList.add('lhide');
    bookpass[nbrrh].classList.remove('rhide');
    bookpass[nbrrh].classList.add('right');
    nbrl++;
    nbrr++;
    nbr++;
    nbrlh++;
    nbrrh++;
    if(nbrl > bookpass.length-1){
        nbrl = 0;
    }
    if(nbr > bookpass.length-1){
        nbr = 0;
    }
    if(nbrr > bookpass.length-1){
        nbrr = 0;
    }
    if(nbrrh > bookpass.length-1){
        arrowleft.classList.add('pointerNone');
    }
    if(nbrlh > bookpass.length-1){
        nbrlh = 0;
    }else{
        arrowright.classList.remove('pointerNone');
    }
})
arrowright.addEventListener('click', ()=>{
    bookpass[nbr].classList.remove('act');
    bookpass[nbr].classList.add('right');
    bookpass[nbrl].classList.remove('left');
    bookpass[nbrl].classList.add('act');
    bookpass[nbrr].classList.remove('right');
    bookpass[nbrr].classList.add('rhide');
    bookpass[nbrlh].classList.remove('lhide');
    bookpass[nbrlh].classList.add('left');
    nbrl--;
    nbrr--;
    nbr--;
    nbrrh--;
    nbrlh--;
    if(nbr < 0){
        nbr = bookpass.length-1;
    }
    if(nbrr < 0){
        nbrr = bookpass.length-1;
    }
    if(nbrl < 0){
        nbrl = bookpass.length-1;
    }
    if(nbrrh < 0){
        nbrrh = bookpass.length-1;
    }else{
        arrowleft.classList.remove('pointerNone');
    }
    if(nbrlh < 0){
        arrowright.classList.add('pointerNone');
    }
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

