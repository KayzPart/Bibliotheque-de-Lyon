const btnmenu = document.querySelector('.menubg');
const closemenu = document.querySelector('.close');
const menubg = document.querySelector('.menumobile');
const btncontact = document.querySelector('.btncontact');
const contact = document.querySelector('.contact');
const closecontact = document.querySelector('.closec');


// Reservation 
const btnbooking = document.querySelector('.btnbooking');
const usereserv = document.querySelector('.usereserv');
const closebooking = document.querySelector('.closebooking');
// *************

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



// Reservation 

closebooking.addEventListener('click', ()=>{
    usereserv.classList.toggle('show');
})

btnbooking.addEventListener('click', ()=>{
    usereserv.classList.toggle('show');
})