/*console.log(document.querySelector('h1').textContent);
document.querySelector('.guess').value=78;
console.log(document.querySelector('.guess').value);*/

let hid = Math.floor(Math.random()*100);
let score = 20;
let hscore = 0;
console.log(hid);
const msg = message => document.querySelector('.message').textContent=message;
const sc = score => document.querySelector('.score').textContent=score;

document.querySelector('.check').addEventListener('click',function()
{
    const guess = Number(document.querySelector('.guess').value);
    console.log(guess, typeof guess); 

    if(!guess)
    {
        msg("Not a Number 🤷‍♂");
        
    }
    else if(guess === hid)
    {
        msg("Greate 🎇🎇");
        document.querySelector('.score').textContent=score;
        document.querySelector('body').style.backgroundColor = 'green';
        document.querySelector('.number').textContent=hid;

        if(score > hscore)
        {
            hscore = score;
            document.querySelector('.highscore').textContent=hscore;
        }
    }
    else if(score > 1)
    {
        msg (guess < hid ?"Number is too short 📉":"Number is too high 💹" );
        score--;
        sc(score);
        /*if(guess < hid)
        {
            msg("Number is too short 📉");
            score--;
            sc(score);
        }
        else if(guess > hid){
            msg("Number is too high 💹");
            score--;
            sc(score);
        }*/
       
    }
    else
    {
        msg("You lost the game 😔😔!! Try again");
        document.querySelector('.score').textContent=0;
        document.querySelector('.highscore').textContent=0;
    }

});

document.querySelector('.again').addEventListener('click',function()
{
     hid = Math.floor(Math.random()*100);
     score = 20;

    msg("Start guessing...");
    sc(score);
    document.querySelector('body').style.backgroundColor = 'black';
    document.querySelector('.number').textContent="?";
    document.querySelector('.guess').value='';

});