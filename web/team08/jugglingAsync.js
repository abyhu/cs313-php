//var http = require('http');
//var urls = [process.argv[2], process.argv[3], process.argv[4]];
//var collectedData = ["", "", ""]; 
//var ready = 0; 
//
//
//for(var i = 0; i < 3; i++) { 
//	getData(url[i], i);
//}
//
//function printData() {
//	for(var j = 0; j < 3; j++) {
//		console.log(collectedData[j]); 
//	}
//}
//
//function getData(thisUrl, iterator) {
//	http.get(thisUrl, function callback(response) { 
//	response.setEncoding("utf8");
//	response.on("data", function(data){ collectedData[iterator] += data; })
//	response.on("end", function(){ 
//		if (ready == 2) {
//			printData();
//		} else {
//			ready++; 
//		}
//	})
//}) 
//}

var http = require('http')
var bl = require('bl')
var results = []
var count = 0
 
function printResults () {
  for (var i = 0; i < 3; i++)
    console.log(results[i])
}
 
function httpGet (index) {
  http.get(process.argv[2 + index], function (response) {
    response.pipe(bl(function (err, data) {
      if (err)
        return console.error(err)
 
      results[index] = data.toString()
      count++
 
      if (count == 3)
        printResults()
    }))
  })
}
 
for (var i = 0; i < 3; i++)
  httpGet(i)
