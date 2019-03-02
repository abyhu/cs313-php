var fs = require('fs');

fs.readFile(process.argv[2], function (error, contents) {
	if (error) {
		return console.error(error); 
	}
	else console.log(contents.toString().split('\n').length - 1);
})

 


