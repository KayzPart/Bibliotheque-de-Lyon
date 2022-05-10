const btnmenu = document.querySelector('.menubg');
const closemenu = document.querySelector('.close');
const menubg = document.querySelector('.menumobile');



btnmenu.addEventListener('click', ()=>{
    menubg.classList.toggle('show');
})
closemenu.addEventListener('click', ()=>{
    menubg.classList.toggle('show');
})
