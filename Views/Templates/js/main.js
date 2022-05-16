const btnmenu = document.querySelector('.menubg');
const closemenu = document.querySelector('.close');
const menubg = document.querySelector('.menumobile');
const btncontact = document.querySelector('.btncontact');
const contact = document.querySelector('.contact');
const closecontact = document.querySelector('.closec');
const bookpass = document.getElementsByClassName('imgbooks');
const arrowleft = document.querySelector('.left');
const arrowright = document.querySelector('.right');
console.log(arrowleft);
let nbr = 1;
bookpass[nbr].classList.add('act');

for (let i = 0; i < bookpass.length; i++) {
    const element = bookpass[i];
    if(i < nbr){
        element.classList.add('left');
    }else{
        element.classList.add('right');
    }
}

arrowleft.addEventListener('click', ()=>{
    bookpass[nbr].classList.remove('act');
    bookpass[nbr].classList.remove('right');
    bookpass[nbr].classList.add('left');
    nbr--;
    if(nbr < 0){
        nbr = bookpass.length-1;
    }
    bookpass[nbr].classList.add('act');
    console.log(nbr);
})
arrowright.addEventListener('click', ()=>{
    bookpass[nbr].classList.remove('act');
    bookpass[nbr].classList.remove('left');
    bookpass[nbr].classList.add('right');
    nbr++;
    if(nbr > bookpass.length-1){
        nbr = 0;
    }
    bookpass[nbr].classList.add('act');
    console.log(nbr);
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