// declaration
const scorep1 = document.querySelector('#score--0');
const scorep2 = document.querySelector('#score--1');
const current1 = document.querySelector('#current--0');
const current2 = document.querySelector('#current--1');
const player1 = document.querySelector('.player--0');
const player2 = document.querySelector('.player--1');

const dice = document.querySelector('.dice');
const rollbtn = document.querySelector('.btn--roll');
const holdbtn = document.querySelector('.btn--hold');
const newgamebtn = document.querySelector('.btn--new');

let currentscore = 0;
let activeP = 0;
let score = [0,0];
let playing = true;

scorep1.textContent = 0;
scorep2.textContent = 0;
dice.classList.add('hidden');

const showscore = function(x,y)
{
    document.querySelector(`#current--${x}`).textContent = y;
    
}
const changeplayer = function()
{
    currentscore = 0;
        //document.querySelector(`#current--${activeP}`).textContent = currentscore;
    showscore(activeP,currentscore);
    activeP = activeP === 0 ? 1:0;
    player1.classList.toggle('player--active');
    player2.classList.toggle('player--active');
}

// Rolling dice function
rollbtn.addEventListener('click',function(){
    if(playing)
    {
    const diceno = Math.trunc(Math.random() * 6)+1;
    dice.classList.remove('hidden');
    dice.src = `dice-${diceno}.png`;

    if(diceno === 1)
    {//switch player
        
        /*currentscore = 0;
        document.querySelector(`#current--${activeP}`).textContent = currentscore;
        showscore(activeP,currentscore);
        activeP = activeP === 0 ? 1:0;
        player1.classList.toggle('player--active');
        player2.classList.toggle('player--active');*/
        changeplayer();

    }
    else{
        // Add score to currentscore
        currentscore += diceno;
        //document.querySelector(`#current--${activeP}`).textContent = currentscore;
        showscore(activeP,currentscore);

    }
}
});

holdbtn.addEventListener('click',function(){
    if(playing)
    {
    score[activeP] += currentscore;

    document.querySelector(`#score--${activeP}`).textContent = score[activeP];

    if(score[activeP] >= 20){
        playing = false;
        dice.classList.add('hidden');
    document.querySelector(`.player--${activeP}`).classList.add('player--winner');
    document.querySelector(`.player--${activeP}`).classList.remove('player--active');
    }
    else
    {
    // change player using hold
        /*currentscore = 0;
        document.querySelector(`#current--${activeP}`).textContent = currentscore;
        showscore(activeP,currentscore);
        activeP = activeP === 0 ? 1:0;
        player1.classList.toggle('player--active');
        player2.classList.toggle('player--active');*/
        changeplayer();
    }
}

});

newgamebtn.addEventListener('click',function(){

    scorep1.textContent = 0;
    scorep2.textContent = 0;
    current2.textContent = 0;
    current1.textContent = 0;
    dice.classList.add('hidden');
    document.querySelector(`.player--${activeP}`).classList.remove('player--winner');

    currentscore = 0;
    activeP = 0;
    score = [0,0];
    playing=true;
    player1.classList.add('player--active');
});