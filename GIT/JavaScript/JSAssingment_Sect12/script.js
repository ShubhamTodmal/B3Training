'use strict';

/////////////////////////////////////////////////
/////////////////////////////////////////////////
// BANKIST APP

/////////////////////////////////////////////////
// Data

// DIFFERENT DATA! Contains movement dates, currency and locale

const account1 = {
  owner: 'Jonas Schmedtmann',
  movements: [200, 455.23, -306.5, 25000, -642.21, -133.9, 79.97, 1300],
  interestRate: 1.2, // %
  pin: 1111,

  movementsDates: [
    '2019-11-18T21:31:17.178Z',
    '2019-12-23T07:42:02.383Z',
    '2020-01-28T09:15:04.904Z',
    '2020-04-01T10:17:24.185Z',
    '2020-05-08T14:11:59.604Z',
    '2021-11-03T17:01:17.194Z',
    '2021-11-01T23:36:17.929Z',
    '2021-11-06T10:51:36.790Z',
  ],
  currency: 'EUR',
  locale: 'pt-PT', // de-DE
};

const account2 = {
  owner: 'Jessica Davis',
  movements: [5000, 3400, -150, -790, -3210, -1000, 8500, -30],
  interestRate: 1.5,
  pin: 2222,

  movementsDates: [
    '2019-11-01T13:15:33.035Z',
    '2019-11-30T09:48:16.867Z',
    '2019-12-25T06:04:23.907Z',
    '2020-01-25T14:18:46.235Z',
    '2020-02-05T16:33:06.386Z',
    '2020-04-10T14:43:26.374Z',
    '2020-06-25T18:49:59.371Z',
    '2020-07-26T12:01:20.894Z',
  ],
  currency: 'USD',
  locale: 'en-US',
};

const accounts = [account1, account2];

/////////////////////////////////////////////////
// Elements
const labelWelcome = document.querySelector('.welcome');
const labelDate = document.querySelector('.date');
const labelBalance = document.querySelector('.balance__value');
const labelSumIn = document.querySelector('.summary__value--in');
const labelSumOut = document.querySelector('.summary__value--out');
const labelSumInterest = document.querySelector('.summary__value--interest');
const labelTimer = document.querySelector('.timer');

const containerApp = document.querySelector('.app');
const containerMovements = document.querySelector('.movements');

const btnLogin = document.querySelector('.login__btn');
const btnTransfer = document.querySelector('.form__btn--transfer');
const btnLoan = document.querySelector('.form__btn--loan');
const btnClose = document.querySelector('.form__btn--close');
const btnSort = document.querySelector('.btn--sort');

const inputLoginUsername = document.querySelector('.login__input--user');
const inputLoginPin = document.querySelector('.login__input--pin');
const inputTransferTo = document.querySelector('.form__input--to');
const inputTransferAmount = document.querySelector('.form__input--amount');
const inputLoanAmount = document.querySelector('.form__input--loan-amount');
const inputCloseUsername = document.querySelector('.form__input--user');
const inputClosePin = document.querySelector('.form__input--pin');

/////////////////////////////////////////////////
// Functions


const formateMovementDate = function(date,local){

  const passedDay = (date1,date2) => Math.round(Math.abs(date2 - date1)/(1000 * 60 * 60 * 24));
  //noe instead showing date we show hoe many days passed to this transaction
  const daysPassed = passedDay(new Date(), date);
  //console.log(daysPassed);

  if(daysPassed === 0) return 'Today';
  if(daysPassed === 1) return 'Yesterday';
  if(daysPassed <= 7) return `${daysPassed} days ago`;
 
  /*const day = `${date.getDate()}`.padStart(2,'0');
  const month = `${date.getMonth()+1}`.padStart(2,'0');
  const year = date.getFullYear(); 
   return `${day}/${month}/${year}`;*/
   //we remove this cause we now fomate it with neatlly
   return new Intl.DateTimeFormat(local).format(date);//here we need local so passed it to para
  
};



const formatedMovmentsCurrency = function(val,local,curr){//here we always pass account noe instead it lest pass only needed para so it can use any where so it take any para
  return new Intl.NumberFormat(local,
    {
  style:'currency',
  currency:curr,
}).format(val);
}




// we also want a date data in here so instead passing one more parameter lets pass account and use its properties
const displayMovements = function (account, sort = false) {
  containerMovements.innerHTML = '';

  const movs = sort ? account.movements.slice().sort((a, b) => a - b) : account.movements;

  movs.forEach(function (mov, i) {
    const type = mov > 0 ? 'deposit' : 'withdrawal';

    const date = new Date(account.movementsDates[i]);

    //as here we loop through move and use 2 para one value and 2nd index so for find current date index we just use already used loop no need to loop again.
    //JS provide this best operation

    const DisplayDate = formateMovementDate(date,account.local);

    /*const formatedMovmentsCurrency = new Intl.NumberFormat(account.local,{
      style:'currency',//currency:'USD'//we already have currency in aour acoounts lets use that
      currency:account.currency,
    }).format(mov);//now we can see we have US doller and price in US currency
    //we need this updation for more place like balance and suumery lets create new function and call it*/
    


    const html = `
      <div class="movements__row">
        <div class="movements__type movements__type--${type}">${
      i + 1
    } ${type}</div>
        <div class="movements__date">${DisplayDate}</div>
        <!--<div class="movements__value">${mov}€</div>instead of this we use above formatted currency-->
        <div class="movements__value">${formatedMovmentsCurrency(mov,account.local,account.currency)}</div>

      </div>
    `;

    containerMovements.insertAdjacentHTML('afterbegin', html);
  });
};




const calcDisplayBalance = function (acc) {
  acc.balance = acc.movements.reduce((acc, mov) => acc + mov, 0);
  labelBalance.textContent = `${formatedMovmentsCurrency(acc.balance,acc.local,acc.currency) }`;
};




const calcDisplaySummary = function (acc) {
  const incomes = acc.movements
    .filter(mov => mov > 0)
    .reduce((acc, mov) => acc + mov, 0);
  labelSumIn.textContent = `${formatedMovmentsCurrency(incomes,acc.local,acc.currency) }`;

  const out = acc.movements
    .filter(mov => mov < 0)
    .reduce((acc, mov) => acc + mov, 0);
  labelSumOut.textContent = `${formatedMovmentsCurrency(Math.abs(out),acc.local,acc.currency) }`;

  const interest = acc.movements
    .filter(mov => mov > 0)
    .map(deposit => (deposit * acc.interestRate) / 100)
    .filter((int, i, arr) => {
      // console.log(arr);
      return int >= 1;
    })
    .reduce((acc, int) => acc + int, 0);
  labelSumInterest.textContent = `${formatedMovmentsCurrency(interest,acc.local,acc.currency) }`;
};




const createUsernames = function (accs) {
  accs.forEach(function (acc) {
    acc.username = acc.owner
      .toLowerCase()
      .split(' ')
      .map(name => name[0])
      .join('');
  });
};
createUsernames(accounts);





const updateUI = function (acc) {
  // Display movements
  displayMovements(acc);

  // Display balance
  calcDisplayBalance(acc);

  // Display summary
  calcDisplaySummary(acc);
};




///////////////////////////////////////
// Event handlers
let currentAccount;
let timer;//we create timer so we can persist it to diff login
//here timer also need for many operation so it help to track whether is running or not and to reset

btnLogin.addEventListener('click', function (e) {
  // Prevent form from submitting
  e.preventDefault();

  currentAccount = accounts.find(
    acc => acc.username === inputLoginUsername.value
  );
  console.log(currentAccount);

  if (currentAccount?.pin === Number(inputLoginPin.value)) {
    // Display UI and message
    labelWelcome.textContent = `Welcome back, ${
      currentAccount.owner.split(' ')[0]
    }`;
    containerApp.style.opacity = 100;

    const now = new Date();
    const option =
     {hour:'numeric',
     minute:'numeric',
     day:'numeric',
     month:'long',
     year:'numeric'
     /*,weekday:'short'*/};
     //const local = navigator.language;
     const local = currentAccount.locale;
    labelDate.textContent = new Intl.DateTimeFormat(local,option).format(now);

    // current Date
    /*const now = new Date();
    const day = `${now.getDate()}`.padStart(2,'0');
    const month = `${now.getMonth()+1}`.padStart(2,'0');
    const year = now.getFullYear();
    const hour = `${now.getHours()}`.padStart(2,'0');
    const min = `${now.getMinutes()}`.padStart(2,'0');
    labelDate.textContent = `${day}/${month}/${year}, ${hour}:${min}`;*/
    //instead of this all lets use our try


    // Clear input fields
    inputLoginUsername.value = inputLoginPin.value = '';
    inputLoginPin.blur();

    // timer
    if(timer) clearInterval(timer);//here when we login we fisrt check if already any timer running if yes then clear it and run new for currnt login
    timer = startLogoutTimer();

    // Update UI
    updateUI(currentAccount);
  }
});




btnTransfer.addEventListener('click', function (e) {
  e.preventDefault();
  const amount = Number(inputTransferAmount.value);
  const receiverAcc = accounts.find(
    acc => acc.username === inputTransferTo.value
  );
  inputTransferAmount.value = inputTransferTo.value = '';

  if (
    amount > 0 &&
    receiverAcc &&
    currentAccount.balance >= amount &&
    receiverAcc?.username !== currentAccount.username
  ) {
    // Doing the transfer
    currentAccount.movements.push(-amount);
    receiverAcc.movements.push(amount);
    //also need to add date
    currentAccount.movementsDates.push(new Date().toISOString());
    receiverAcc.movementsDates.push(new Date().toISOString());

    clearInterval(timer);//here so when we do transfer our timer will restart
    timer = startLogoutTimer();

    // Update UI
    updateUI(currentAccount);
  }
});





btnLoan.addEventListener('click', function (e) {
  e.preventDefault();

  const amount = Number(inputLoanAmount.value);

  if (amount > 0 && currentAccount.movements.some(mov => mov >= amount * 0.1)) {

    setTimeout(function()
    {
    // Add movement
    currentAccount.movements.push(amount);

    //Add date
    currentAccount.movementsDates.push(new Date().toISOString());

    // Update UI
    updateUI(currentAccount);
    clearInterval(timer);//here so when we take loan our timer will restart
    timer = startLogoutTimer();
  }
    ,3000)};//as real bank take time for load so we ise settimeout so put if loop statment insettimeout
    //let use 3 sec for approval
  inputLoanAmount.value = '';
});





btnClose.addEventListener('click', function (e) {
  e.preventDefault();

  if (
    inputCloseUsername.value === currentAccount.username &&
    Number(inputClosePin.value) === currentAccount.pin
  ) {
    const index = accounts.findIndex(
      acc => acc.username === currentAccount.username
    );
    console.log(index);
    // .indexOf(23)

    // Delete account
    accounts.splice(index, 1);

    // Hide UI
    containerApp.style.opacity = 0;
  }

  inputCloseUsername.value = inputClosePin.value = '';
});





let sorted = false;
btnSort.addEventListener('click', function (e) {
  e.preventDefault();
  displayMovements(currentAccount, !sorted);
  sorted = !sorted;
});

//              logout timer            //
const startLogoutTimer = function()
{

  const tictok = function()
  {

  const min = String(Math.trunc(time/60)).padStart(2,'0');
  const sec = String(time%60).padStart(2,'0');
  labelTimer.textContent = `${min}:${sec}`;


    if(time === 0) 
    {
      clearInterval(timer);
      labelWelcome.textContent = 'Log in to get started';
      containerApp.style.opacity = 0;
    }
    time--;
};
  /*//cal the timer every sec
  const timer = setInterval(function(){
  //each callcback call rpint remain time to user inteface

  //but we also want to show min cause we setting 10 min
  const min = String(Math.trunc(time/60)).padStart(2,'0');//it will show min 
  const sec = String(time%60).padStart(2,'0');//and it will show sec
  labelTimer.textContent = `${min}:${sec}`;//still it showing min in decimal so lets round


  //when timer 0, stop timer and logout user
    if(time === 0) 
    {
;      clearInterval(timer);
      labelWelcome.textContent = 'Log in to get started';
      containerApp.style.opacity = 0;
    }//clrea interval for stop timer
    //here we put setinteval in var and call here so it will get where to stop
  }, 1000);

    //decrease time by 1 sec
    time--;*/

    //set time for 5 min
  let time = 600;
  tictok();
  const timer = setInterval(tictok, 1000);
  //3
  return timer;
  //so now we call it on login so then we check further 

}//but as we login timer start with 9 not with 10 so for that we have to put timer function body in anoher and call it emmdiatly
//now to run call this function on login

// 3 
//but as we change user we see there is 2 timer running so we have to check whether is any timer already running before if yes then stop it and run new timer so we can get sepearate timer for 

//4
//now we need this timer whenevr we do something in our project like transfer of loan so we reset timer there too




/////////////////////////////////////////////////
/////////////////////////////////////////////////
// LECTURES

// fake logined account
/*currentAccount = account1;
containerApp.style.opacity = 100;
updateUI(currentAccount);

//experiment on date
const now = new Date();
const option = {hour:'numeric',minute:'numeric',day:'numeric',month:'long',year:'numeric',weekday:'short'};
labelDate.textContent = new Intl.DateTimeFormat('en-US',option).format(now);

updateUI(currentAccount);*/
//lets try this on our project

//we jave currency here so lets use Intl.NumberFomate for that as diff account have diff lang

