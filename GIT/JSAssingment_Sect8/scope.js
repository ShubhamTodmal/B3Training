function show(n)
{
    const age = n;
    console.log(name);

    function showstring()
    {
        var out = `My name is ${name} and I'm ${age} year old`;
        console.log(out);

        if(age >= 18 && age <= 25)
        {
            //let name = "shubh"; // instead of createing variable with same name we can assign it a new value like below
            name = "shubh"; //but after reassigning its new value is last long upto its declarion scope
            var who = `Your name is Todmal, ${name}`;
            console.log(who);
        }
        
        //console.log(who); // work here too, but if we declare who with 'let' it will not work here
    }
    //console.log(out); // it shows error cause printing var out side of its own scope, work only it assosiate with block scope

    
    
    showstring();
    console.log(name);
    return age;
}
let name = "shubham";
show(22);
