// dom element
const table = document.querySelector('tbody');
const formbox = document.querySelector('.modal1')
const form = document.getElementById('carform1');
const newentry = document.querySelector('.button');
const overlay = document.querySelector('.overlay');
const submit = document.querySelector('.submit');
const searchData = document.querySelector('.modal2');

// open form 
newentry.addEventListener('click',function(){
    openform();
});
// hide form
overlay.addEventListener('click',function(){
    overlay.classList.add('hidden');
    formbox.classList.add('hidden'); 
    searchData.classList.add('hidden'); 
    document.getElementById('modelno').value = '';
    document.getElementById('carname').value = '';
    document.getElementById('companyname').value = ''
    document.getElementById('Etype').value = '';
    document.getElementById('milage').value = ''
});

window.onload = () =>{
    // localStorage.Item('carinfo',JSON.stringify(carinfo));
    showData();
 }

// data maipulation
let id= 'no';

// ManageData
function manageData()
{
    modelno = document.getElementById('modelno').value;
    carname = document.getElementById('carname').value;
   companyname= document.getElementById('companyname').value;
    Etype= document.getElementById('Etype').value;
    milage =document.getElementById('milage').value;

    if(modelno=='' || carname=='' || Etype=='' || milage== '')
    {
        return 0;
    }
    else
    {
        if(id == 'no')
        {
            let arr = getData();
            if(arr==null)
            {
                let data = [[modelno,carname,companyname,Etype,milage]];;
                setData(data);
                showmsg('Data Added!');
            }
            else{
                let add  = false;
                for(k in arr)
                {
                if(modelno == arr[k][0])
                {
                   add = true;
                   msg =`Dont Enter Same Model Number <br> Please Enter Unique Model Number!`;
                   showmsg(msg);
                    break;
                }
                }
                if(add == false){
                    arr.push([modelno,carname,companyname,Etype,milage]);
                    setData(arr);
                    showmsg('Data Added!');
                }
            }
        }
        else{
            let arr = getData();
            arr[id][0] = modelno; arr[id][1]= carname; arr[id][2] = companyname;
            arr[id][3] = Etype; arr[id][4] = milage;
            setData(arr);
            showmsg('Data Updated!');
        }
       
    }
    showData();
    
}

//Select data
function showData()
{
    let arr = getData();
    if(arr!=null)
    {
        let html = '';
        let sno = 1;
        table.innerHTML = '';
        for(let k in arr)
        {
            html += `<tr><td>${sno}</td> <td>${arr[k][0]}</td> <td>${arr[k][1]}</td> <td>${arr[k][2]}</td> <td>${arr[k][3]}</td> <td>${arr[k][4]}</td> <td><button onclick="editData(${k})">📝</button><button onclick="deleteData(${k})">🗑</button></td></tr>`;
            sno++;
        }
        table.innerHTML = html;
        
    }
}

//edit data
function editData(rid)
{
    id = rid
    openform();
    let arr = getData();
    console.log(arr[rid][0]);

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
        showData();
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
    console.log(s);
    let html = '';
    let addhtml = '';
    searchData.innerHTML = '';
    for(k in arr)
    {
        if(s == arr[k][0])
        {
            console.log(arr[k]);
            document.querySelector('.search').value = '';
            addhtml += searchHtml(html,arr);
            
            
            
        }
        else if(s == arr[k][1]){
            console.log(arr[k]);
            document.querySelector('.search').value = '';
            addhtml += searchHtml(html,arr);
        }    
    }
    searchData.innerHTML = addhtml;
    document.querySelector('.search').value='';
    overlay.classList.remove('hidden'); 
    searchData.classList.remove('hidden');

}

// Sort Data
// Name Sort
function SortByName()
{
    let arr = getData();
    arr.sort(sortName);
    setData(arr);
    showData();
}
// Model No sort
function SortByModelNo()
{
    let arr = getData();
    arr.sort(sortModelNo);
    setData(arr);
    showData();
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

// sorting function
const sortName = function(a,b)
{
    if(a[1] === b[1])
    {
        return 0;
    }
    else{
        return (a[1] < b[1]) ? -1:1;
    }
}

const sortModelNo = function(a,b)
{
    if(a[0] === b[0])
    {
        return 0;
    }
    else{
        return (a[0] < b[0]) ? -1:1;
    }
}