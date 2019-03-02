var http = require('http');
var url = process.argv[2]; 
var collectedData = "";


http.get(url, function callback(response) {
	response.setEncoding("utf8");
	response.on("data", function(data){
		collectedData = collectedData + data; 
	})
	response.on("end", function(){
		console.log(collectedData.length);
		console.log(collectedData); 
	})
}); 