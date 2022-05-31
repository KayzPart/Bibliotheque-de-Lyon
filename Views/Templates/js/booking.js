const btnbooking = document.querySelector('.btnbooking');
const usereserv = document.querySelector('.usereserv');
const closebooking = document.querySelector('.closebooking');

closebooking.addEventListener('click', ()=>{
    usereserv.classList.toggle('show');
})

btnbooking.addEventListener('click', ()=>{
    usereserv.classList.toggle('show');
})