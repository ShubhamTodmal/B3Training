// dom element
const table = document.querySelector('#display');
const formbox = document.querySelector('.form')
const form = document.getElementById('carform');
const newentry = document.querySelector('.button');
const overlay = document.querySelector('.overlay');
const update = document.querySelector('.update');
const submit = document.querySelector('.submit');

// open form 
newentry.addEventListener('click',function(){
    overlay.classList.remove('hidden'); 
    formbox.classList.remove('hidden');
});
// hide form
overlay.addEventListener('click',function(){
    overlay.classList.add('hidden');
    formbox.classList.add('hidden');  
    document.getElementById('modelno').value = "";
    document.getElementById('carname').value = "";
    document.getElementById('companyname').value = "";
    document.getElementById('Etype').value = "";
    document.getElementById('milage').value = "";
    show(); 
});

window.onload = () =>{
   // localStorage.Item('carinfo',JSON.stringify(carinfo));
    show();
}
// store data in local storage
const carinfo = JSON.parse(localStorage.getItem('carinfo')) || [];
const adddata = (mno,name,cname,type,mi) => {
    carinfo.push([
        mno,name,cname,type,mi
    ]);
    localStorage.setItem('carinfo',JSON.stringify(carinfo));
    return {mno,name,cname,type,mi};
};
console.log(typeof carinfo);


// display data function
const show = () => {
    console.log(localStorage.getItem('carinfo'));
    if(localStorage.getItem('carinfo'))
    {
        let arr= [];
        var output = document.querySelector("tbody");
        output.innerHTML = "";
        JSON.parse(localStorage.getItem('carinfo')).forEach(data => {
            output.innerHTML += `
            <tr>
                <td> ${data[0]}</td>
                <td> ${data[1]}</td>
                <td> ${data[2]}</td>
                <td> ${data[3]}</td>
                <td> ${data[4]}</td>
                <td style="text-align:left;"> <button onclick="editData(${data[0]})">📝</button> <button type="button" onclick="delData(${data[0]})">🗑</button></td>
            </tr>
            `;
             });
            
        }
       
    };

    // add data function
form.addEventListener('submit',function(e)
{
    e.preventDefault();

 modelno = document.getElementById('modelno').value
 carname = document.getElementById('carname').value
companyname= document.getElementById('companyname').value
 Etype= document.getElementById('Etype').value
 milage =document.getElementById('milage').value
console.log(modelno,carname,companyname,Etype,milage);
    
    const newstudent = adddata(modelno,carname,companyname,Etype,milage);
    document.getElementById('modelno').value = "";
    document.getElementById('carname').value = "";
    document.getElementById('companyname').value = "";
    document.getElementById('Etype').value = "";
    document.getElementById('milage').value = "";
    overlay.classList.add('hidden'); 
    formbox.classList.add('hidden');
    show();
   
});

// delete data function
function delData(d)
{
    for (let i = 0; i < carinfo.length; i++) {
        if(d == carinfo[i][0])
        {
            console.log(i);
            var a = i;
            break;
        }   
    }
    carinfo.splice(a,1);
    localStorage.setItem('carinfo',JSON.stringify(carinfo));
    //carinfo = JSON.parse(localStorage.getItem('carinfo'));
    
    show();
}

function editData(d)
{ 
    overlay.classList.remove('hidden'); 
    formbox.classList.remove('hidden');
    submit.classList.toggle('hidden')
    update.classList.toggle('hidden');
      JSON.parse(localStorage.getItem('carinfo')).forEach(data => {
          if (d == data[0])
          {
            overlay.classList.remove('hidden'); 
            formbox.classList.remove('hidden');

            modelno = document.getElementById('modelno').value = data[0]
            carname = document.getElementById('carname').value = data[1]
           companyname= document.getElementById('companyname').value = data[2]
            Etype= document.getElementById('Etype').value = data[3]
            milage =document.getElementById('milage').value = data[4]

            for (let i = 0; i < carinfo.length; i++) {
                if(d == carinfo[i][0])
                {
                    carinfo[i][0] = modelno;
                    carinfo[i][1] = carname;
                    carinfo[i][2] = companyname;
                    carinfo[i][3] = Etype;
                    carinfo[i][4] = milage;
                }   
            }

        }        
        });
        console.log(carinfo);


        
        //localStorage.setItem('carinfo',JSON.stringify(arr));

}

update.addEventListener('click',function(){

    console.log(carinfo);

});