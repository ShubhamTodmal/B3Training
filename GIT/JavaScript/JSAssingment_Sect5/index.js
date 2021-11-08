
//  fror 1 array
console.log("----For 1 array------");
const temp = [3,-2,-6,-1,'error',9,13,17,15,14,9,5];

const caltemp = function(arr)
{
    let max = arr[0];
    let min = arr[0];

    for (let i=0;i<arr.length; i++)
    {
        if(typeof arr[i] !== 'number') continue;

        if(arr[i] > max) max = arr[i];
        if(arr[i] < min) min = arr[i];
    }
    console.log(max, min);
    return max-min;
}

const amp = caltemp(temp);
console.log(amp);

//  fror 2 array
console.log("----For 1 array------");
const temp1 = [3,-2,-6,-1,'error',9,13,17,15,14,9,5];
const temp2 = [4,7,-5,12,-7,-4];

const caltemp2 = function(t1,t2)
{
    const arr = temp1.concat(temp2);
    let max = arr[0];
    let min = arr[0];

    for (let i=0;i<arr.length; i++)
    {
        if(typeof arr[i] !== 'number') continue;

        if(arr[i] > max) max = arr[i];
        if(arr[i] < min) min = arr[i];
    }
    console.log(max, min);
    return max-min;
}

const amp2 = caltemp2(temp1,temp2);
console.log(amp2);