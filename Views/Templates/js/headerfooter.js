const btnmenu = document.querySelector('.menubg');
const closemenu = document.querySelector('.close');
const menubg = document.querySelector('.menumobile');
const btncontact = document.querySelector('.btncontact');
const contact = document.querySelector('.contact');
const closecontact = document.querySelector('.closec');

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
