// dom element
const table = document.querySelector('tbody');
const formbox = document.querySelector('.modal1')
const form = document.getElementById('carform1');
const newentry = document.querySelector('.button');
const overlay = document.querySelector('.overlay');
const submit = document.querySelector('.submit');
const searchData = document.querySelector('.modal2');

//validation
const model = document.getElementById('mnov');
const car = document.getElementById('cnamev');
const company = document.getElementById('conamev');
const milagev = document.getElementById('milagev');


/*const val = function(a,b,c,d)
{
    if (a == '') model.innerText='Please Enter Model Number!';
    if (b == '') car.innerText='Please Enter Car Name!';
    if (c == '') company.innerText='Please Enter Engine Type!';
    if (d == '') milagev.innerText='Please Enter Milage!';
}*/

// Client side validation
function formValidation(id)
{
    const error = document.getElementById(id);
    const checkval = error.value;
    //console.log(error.value);
    if(checkval == '')
    {
        error.nextElementSibling.innerText="Please Enter This Feild!";
    }
    else error.nextElementSibling.innerText="";

    /*modelno = Number(document.getElementById('mno').value);
    console.log(modelno);
    carname = document.getElementById('cname').value;
   companyname= document.getElementById('coname').value;
    milage =document.getElementById('milage').value;

    if(modelno=='' || carname=='' || companyname=='' || milage== '')
    {
        val(modelno,carname,companyname,milage);
    }*/
}

/*const ArrForsort = function(arr//,sort=false//,k=0,sortType=0)
{
      let newArr;
      if(k === 2)
        {
            if(sortType === 1) {newArr = arr.sort((a,b) => a[0] < b[0] ? 1:-1);}
            else { newArr = arr.sort((a,b) => a[0] < b[0] ? -1:1);}
        }
    if(k === 1)
        {
            if(sortType === 1) {newArr = arr.sort((a,b) => a[1] < b[1] ? 1:-1);}
            else {newArr = arr.sort((a,b) => a[1] < b[1] ? -1:1) ;}
        }
    if(k === 0 && sortType === 0)
        {
            newArr = arr;
        }
       
        showData(newArr);
}
*/

/*//Select data
function showData(arr//,sort=false,k=0,sortType=0//)
{
   // let newArr;
    /*if(k === 2)
        //{newArr = sort ? arr.sort() : arr;}//newArr = arr.sort();
    if(k === 1)
       // {newArr = sort ?  arr.sort((a,b) => a[1] < b[1] ? -1:1) : arr;}// newArr = arr.sort((a,b) => a[1] < b[1] ? -1:1) ;
    if(k === 0)
        {
            newArr = getData();
        }*/
   /* if(k === 2)
        {
            if(sortType === 1) {newArr = arr.sort((a,b) => a[0] < b[0] ? 1:-1);}
            else { newArr = arr.sort((a,b) => a[0] < b[0] ? -1:1);}
        }
    if(k === 1)
        {
            if(sortType === 1) {newArr = arr.sort((a,b) => a[1] < b[1] ? 1:-1);}
            else {newArr = arr.sort((a,b) => a[1] < b[1] ? -1:1) ;}
        }
    if(k === 0 && sortType === 0)
        {
            newArr = arr;
        }*/
    /*if(arr!=null)
    {
        let html = '';
        let sno = 1;
        table.innerHTML = '';
        for(let k in arr)
        {
            html += `<tr><td>${sno}</td> <td>${ arr[k][0]}</td> <td>${arr[k][1]}</td> <td>${arr[k][2]}</td> <td>${arr[k][3]}</td> <td>${arr[k][4]}</td> <td><button onclick="editData(${k})">📝</button><button onclick="deleteData(${k})">🗑</button></td></tr>`;
            sno++;
        }
        table.innerHTML = html;
        
    }
}

//edit data
function editData(rid)
{
    //console.log(rid);
    id = rid
    //console.log(id);
    openform();
    let arr = getData();
    //console.log(arr[rid]);

    document.getElementById('modelno').value = arr[rid][0];
    document.getElementById('carname').value = arr[rid][1];
    document.getElementById('companyname').value = arr[rid][2];
    document.getElementById('Etype').value = arr[rid][3];
    document.getElementById('milage').value = arr[rid][4];

}

//Delete Data
function deleteData(rid)
{
    let  arr = getData();
    let del = confirm("Do you want to Delete selected data!");
    if(del == true)
    {
        arr.splice(rid,1);
        setData(arr);
        showData(arr);
        searchData.innerHTML = `Data Deleted!`;
        overlay.classList.remove('hidden'); 
        searchData.classList.remove('hidden');
    }
    else{
        return 0;
    }

}

// search Data
function search()
{
    let arr = getData();
    s = document.querySelector('.search').value;
   // console.log(s);
    //let html = '';
    //let addhtml = '';
    let narr = []
   // searchData.innerHTML = '';
    for(k in arr)
    {
        if(s == arr[k][0])
        {
            narr = [arr[k]];
            showData(narr);
           // addhtml += searchHtml(html,arr);    
        }
        else if(arr[k][1].includes(s))
        {
            narr.push(arr[k]);
            console.log(narr);
            showData(narr);
           // addhtml += searchHtml(html,arr);
        }    
    }
    //searchData.innerHTML = addhtml;
   // overlay.classList.remove('hidden'); 
    //searchData.classList.remove('hidden');
    if(document.querySelector('.search').value === '')
    {
        showData(arr);
        narr = [];
    }

}

// Sort Data
// Name Sort
/*let sorted = false;
function SortByNameAsc()
{
    let arr = getData();
    //arr.sort(function(a,b){
     //  return a[1] < b[1] ? -1:1;
    //});
    //instead call callback function we have
    //arr.sort()//for string we not need any extra or
    //arr.sort((a,b) => a- b)//for ascending b-a for dscending
    //arr.sort((a,b) => a[1] - b[1])
    //setData(arr);
    showData(arr,!sorted,1);
    sorted = !sorted;
}//
/*const sortName = function(a,b)
{
    if(a[1] === b[1])
    {
        return 0;
    }
    else{
        return (a[1] < b[1]) ? -1:1;
    }
}
function SortByNameDesc()
{
    let arr = getData();
    showData(arr,!sorted,1,1);
    sorted = !sorted;
}

// Model No sort
function SortByModelNoAsc()
{
    let arr = getData();
    showData(arr,!sorted,2);
    sorted = !sorted;
}
function SortByModelNoDesc()
{
    let arr = getData();
    showData(arr,!sorted,2,1);
    sorted = !sorted;
}*/

/*
function Allsort(col,t)
{
    const bycol = col;
    const byt = t;
    const arr = getData();
    //showData(arr,!sorted,bycol,byt);
    //sorted= !sorted;
    ArrForsort(arr,bycol,byt);
    //sorted = !sorted;
    setData(arr);
}

function SortData(id)
{
    if(id === 'c_asc')
    {
        Allsort(1);
    }
    if(id === 'c_desc')
    {
        Allsort(1,1)
    }
    if(id === 'm_asc')
    {
        Allsort(2);
    }
    if(id === 'm_desc')
    {
        Allsort(2,1);
    }
}





// repeated statment
function getData()
{
    let  arr = JSON.parse(localStorage.getItem('carinfo'));
    return arr;
}

function setData(arr)
{
    localStorage.setItem('carinfo',JSON.stringify(arr));
}

function searchHtml(h,arr)
{
    h = `<div><label>Model No.:</label><label> ${arr[k][0]} </label></div>
            <div><label>Car Name:</label><label >${arr[k][1]} </label></div>
            <div><label>Comapny Name:</label><label> ${arr[k][2]} </label></div>
            <div><label>Engine Type:</label><label> ${arr[k][3]} </label></div>
            <div><label>Milage:</label><label> ${arr[k][4]} </label></div><br><br>`;

            return h;
}

function showmsg(msg)
{
    formbox.classList.add('hidden');
    searchData.innerHTML = msg;
    searchData.classList.remove('hidden');
}
function openform()
{
    formbox.classList.remove('hidden');
    overlay.classList.remove('hidden');
}
*/
