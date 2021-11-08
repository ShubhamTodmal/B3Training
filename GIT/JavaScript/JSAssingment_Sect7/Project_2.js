const modal = document.querySelector('.modal');
const overlay = document.querySelector('.overlay');
const closeModal = document.querySelector('.close-modal');
const btns = document.querySelectorAll('.show-modal');

// function to open modal
const open = function(){
    modal.classList.remove('hidden');
    overlay.classList.remove('hidden');     
}
// function to close modal
const cls = function()
{
    modal.classList.add('hidden');
    overlay.classList.add('hidden');   
}

// open function in buttons
for(let i=0; i<btns.length; i++)
{
    btns[i].addEventListener('click',open);
}

// close function on overlay and close button
closeModal.addEventListener('click',cls);
overlay.addEventListener('click',cls);

// close function through eac button
document.addEventListener('keyup',function(e){
    if(e.key === "Escape" && !modal.classList.contains('hidden'))
    {
       cls();
    }
});
