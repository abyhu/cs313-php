var fs = require('fs');
var pt = require('path');

fs.readdir(process.argv[2], function (error, list) {
	if (error){
		return console.error(error); 
	}
	list.forEach(function(listitem) {
  		if(pt.extname(listitem) == ('.' + process.argv[3])) {
			console.log(listitem.toString()); 
		}
	});
})

