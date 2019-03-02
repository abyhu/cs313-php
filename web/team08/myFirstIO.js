var fs = require('fs');

var contents = fs.readFileSync(process.argv[2]); 

console.log(contents.toString().split('\n').length -1); 

 


