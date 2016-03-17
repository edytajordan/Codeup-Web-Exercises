"use strict";

// var message = "Hello from external Javascript";
// console.log(message);

// if (25 > 24) {
//     //code will only run if true
//     console.log(' first condition was true');
// }else{
//     //code will only run if false
//     console.log('nothing is true');
// }

var i = 0;

while (i < 5) {
    i++;
}

for (var i = 0; i <= 20; i ++) {
   console.log('Number of times through the loop: ' + i); 
    if (i % 2 == 0) {
        continue;
    }
    console.log(i + ' is an odd number');
}