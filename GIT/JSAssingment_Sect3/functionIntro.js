function describeCountry(country, population, capCity) {
    return (`${country} has ${population} million people and its capital city is ${capCity}`);
}

console.log(describeCountry('Finland', 3, 'Helsinki'));

const data1 = describeCountry('India', 138, "Delhi");
const data2 = describeCountry('London', 56, "NewYork");
const data3 = describeCountry('US', 78, "America");

console.log(data1);
console.log(data2);
console.log(data3);