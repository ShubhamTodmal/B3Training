'use strict';

/////////////////////////////////////////////////
/////////////////////////////////////////////////
// BANKIST APP

// Data
const account1 = {
  owner: 'Jonas Schmedtmann',
  movements: [200, 450, -400, 3000, -650, -130, 70, 1300],
  interestRate: 1.2, // %
  pin: 1111,
};

const account2 = {
  owner: 'Jessica Davis',
  movements: [5000, 3400, -150, -790, -3210, -1000, 8500, -30],
  interestRate: 1.5,
  pin: 2222,
};

const account3 = {
  owner: 'Steven Thomas Williams',
  movements: [200, -200, 340, -300, -20, 50, 400, -460],
  interestRate: 0.7,
  pin: 3333,
};

const account4 = {
  owner: 'Sarah Smith',
  movements: [430, 1000, 700, 50, 90],
  interestRate: 1,
  pin: 4444,
};

const accounts = [account1, account2, account3, account4];

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


/*
*************************** Login Event ***********************
*/
let CurrentLogin; // we need this in future for more operation


btnLogin.addEventListener('click',function(e){
  e.preventDefault();

  CurrentLogin = accounts.find(acc => acc.username === inputLoginUsername.value);
  //if(CurrentLogin &&CurrentLogin.pin === Number(inputLoginPin.value))
  if(CurrentLogin?.pin === Number(inputLoginPin.value))//same as above
  {
    //here if all true display UI and calculate its bal summery
    
    // Display UI and Message
    labelWelcome.textContent = `Welcome ${CurrentLogin.owner.split(' ')[0]}`;
    containerApp.style.opacity = 100;

    //clear input field
    inputLoginUsername.value = inputLoginPin.value = '';//or write separate
    //but we see curser is blinbking at pin field so to remove its focus lets use blur()
    inputLoginPin.blur();

    //clear input field

    // display logined transaction
    UI(CurrentLogin);

    //

  }
})
console.log(accounts);


/*
  ************************ Transaction Display ************************
*/
const displayMovements = function(movements, sort=false)//sort is false cause at start we have to display movments as they appear
{
    containerMovements.innerHTML = '';// use this cause we already have some values in html so we empty that container and put our real values

    const movSort = sort ? movements.slice().sort((a,b) => a - b) : movements;//slicce is used cause sort() method also change in real array so slice is create a copy hence we use slice instead of spread operator and then use sort so our original array is have no changes
    //up here if sort is true we sort our movments else we show regualr movments

    movSort.forEach(function(mov,i){//here also have 2 types withdraw and deposit we have to tell which one is here
        const type = mov > 0 ? 'deposit' : 'withdrawal'
        const html = ` <div class="movements__row">
                            <div class="movements__type movements__type--${type}">${i+1} ${type}</div>
                            <div class="movements__value">${mov}€</div>
                        </div>`;

                        // now we have to add above html to constainer so we need to find container id or name
                        containerMovements.insertAdjacentHTML('afterbegin',html);//we can use innerhtml here but it add data as it is and we got old transaction 1st. But using above we add next data just after the element so new data shows up and old data goes down


                    });
};


/*
*************************** Show Total Balance***********************
*/
//as we need this afterward lets modify
const PrintTotalBal = function(account)//as we store bal in account so we need accounts data
{
  account.balance = account.movements.reduce((acc,val) => acc+val,0);//acc start with 0
  //console.log(bal);//lets print it on view for that we need dom element name

  //lets store balance in account object
  //account.balance = bal; or store directly like above
  labelBalance.textContent = /*bal+'€' or*/`${account.balance}€` ;

  //modification is done lets call it correctly

};
//PrintTotalBal(movements); Now lets try with actual accounts data


/*
*************************** Show total of Withdraw and Credit ***********************
*/
const DisplayTransSummeary = function(account)
{
  // for credited money
  const Totalcredited = account.movements
  .filter(val => val > 0)
  .reduce((acc,val) => acc + val,0);//here we just add all deposited data we dont need new array so map not used
  //console.log(income);//now lets show it on view window
  //we need its element
  labelSumIn.textContent = `${Totalcredited}€`;

  //for debited money
  const Totaldebited = account.movements
  .filter(val => val < 0)
  .reduce((acc,val) => acc+Math.abs(val),0);//here we just add all debited data we dont need new array so map not used
  //console.log(Totaldebited);//lets show this on screen
  labelSumOut.textContent = `${Totaldebited}€`;

  //for interest
  const interest = account.movements
  .filter(val => val > 0)//here we need to find interest on the credited data so we create new array using map and then do addition of that array
  .map(val => val* account.interestRate /100)//here 1.2 is interest so to find % we divid by 100
  // for new rule
  .filter((val) => val > 1)//here we see 0.84 aslo there so to remove it we use filter
  .reduce((acc,val) => acc+val,0);
  //let show it on view
  labelSumInterest.textContent = `${interest}€`;

  //but we have Different interest for different account holder hence we have to make changes
  //so instead of only movments we have to pass whole account so we can use both movments and its insterest
  //now call that with account not with accounts movments

  //let suppose bank have new rule to do addition of interest if it is atleast 1 so we just add new filter after map to see whether data is greater than 1
  // now value is change cause we see 0.84 is removed

}

/*
************** put above 3 function in one function so we can get updated ui Where we need
****************************
*/
const UI = function(acc)//here we need account data
{
  //call transaction function here
  displayMovements(acc.movements);

  //display Total balance
  //call total balance here
  PrintTotalBal(acc);

  //display summery of transactios
  //call summery function here
  DisplayTransSummeary(acc);
}


/*
*************************** Tarnsfer Process ***********************
*/
btnTransfer.addEventListener('click',function(e){
  e.preventDefault();
  const amount =  Number(inputTransferAmount.value);
  //const ToAccount = inputTransferTo.value; //lets find this value is present or not so
  const ToAccount = accounts.find(acc => inputTransferTo.value === acc.username);
  console.log(amount,ToAccount);

  inputTransferAmount.value = inputTransferTo.value = '';
  if(amount > 0 && amount <= CurrentLogin.balance && ToAccount && ToAccount.username !== CurrentLogin.username)//here we dont have balance property but we already find bal and dsiplay it on view but we not stored it so lets stored it so we can use that here so lets modify bal show function
  {
    console.log('Tarnsfer valid');
    //now lets push data in cuurent and reciver acoount to add this transaction detail
    CurrentLogin.movements.push(-amount);//here we debit amount so amount in -ve
    ToAccount.movements.push(amount);//here amount is credited so amount in +ve

    //now we need to updat UI so lets call that 3 function for bal,summery and movments
    //Updated UI
    UI(CurrentLogin);
  }
  else{
    console.log('Invalid ');
  }


})


/*
******************************** Loan account ***********************
*/

btnLoan.addEventListener('click',function(e){

  e.preventDefault();
  const amount = Number(inputLoanAmount.value);

  if(amount > 0 && CurrentLogin.movements
    .some(mov => mov >= amount*0.1))//here it serach whether any mov in our current logined have greater than 10% of our laon amount if yes loan approved
    {
     // console.log('Loan approved');//lets push loan in movements
     CurrentLogin.movements.push(amount);
    }
    //lets update the UI to see loan credited in account or not
    UI(CurrentLogin);
    inputLoanAmount.value = '';``
});



/*
******************************** close account ***********************
*/
btnClose.addEventListener('click',function(e){
  e.preventDefault();

  if(inputCloseUsername.value === CurrentLogin.username && Number(inputClosePin.value) === CurrentLogin.pin)
  {
    const index = accounts.findIndex(acc => acc.username === CurrentLogin.username);
    console.log(index);

  inputCloseUsername.value = inputClosePin.value = '';
  containerApp.style.opacity = 0;
  accounts.splice(index,1);
  }
  labelWelcome.textContent = 'Log in to get started';

});



/*
*************************** sort transaction ***********************
*/

// for sort we need to display movements and for that we have a function so lets add one paramter to that function as sort so it will simplify it

let sorted = false;//it will store the state of our data where it sorted or not
btnSort.addEventListener('click',function(e){
  e.preventDefault();
  
  //displayMovements(CurrentLogin.movements,true);//upto now its just sort after click but again clicking it not show tansaction as it appear
  displayMovements(CurrentLogin.movements,!sorted);//it change the sorted state as it true it change to false as click if it is false it change to true after click
  sorted = !sorted;//here we store state of storted after click means if false then after click it will true and vice-versa

})



/*
*************************** Create new User Name***********************
*/
const name = 'shubham todmal';

const createUserName = function(acc){

  acc.forEach(function(acc){
    acc.username =acc.owner//create new property username for each accounts
    .toLowerCase()
    .split(' ')
    .map((val) => val[0].toUpperCase())
    .join('');
  });
};
  /*const  username = user
  .toLowerCase()
  .split(' ')
  .map((username) => username[0].toUpperCase()+username.slice(1))//here we use arrow functoin and not return map but JS implicitly return it
  .join('');
  console.log(username);//lets put this all in function
};//but here we dont want to create new array we have to modified existed array hence we modifey this function now*/
createUserName(accounts);





/////////////////////////////////////////////////
/////////////////////////////////////////////////
// LECTURES

/*const currencies = new Map([
  ['USD', 'United States dollar'],
  ['EUR', 'Euro'],
  ['GBP', 'Pound sterling'],
]);

const movements = [200, 450, -400, 3000, -650, -130, 70, 1300];*/

/////////////////////////////////////////////////
