const express = require('express');
const app = express();
const PORT = process.env.PORT || 5000;

// tell it to use the public directory as one where static files live
app.use(express.static(__dirname + '/public'));

// views is directory for all template files
app.set('views', __dirname + '/views');
app.set('view engine', 'ejs');

//rule of how to process the form
app.get('/calculateShipping', calculate); 

//rule for the home page and start the server listening
app.get('/', (req, res) => res.render('pages/index'))
app.listen(PORT, () => console.log(`Listening on ${ PORT }`))



function calculate(request, response) {
	const pounds = Number(request.query.pounds); 
	const ounces = Number(request.query.ounces);
	const type = request.query.mailType;
	
	if(pounds == 0 
	   && ounces > 4 && (type == "Letters (Stamped)" 
						 || type == "Letters (Metered")) 
	{
		type = "Large Envelopes (Flats)";
	} 
	if ( pounds == 0 && ounces > 13 && type == "Large Envelopes (Flats)") 
	{
		type = "First-Class Package Service (Retail)";
	}
	
	getPrice(response, pounds, ounces, type);
}

function getPrice(response, pounds, ounces, type) {
	var price = 0.0;
	
	switch(type) {
		case "Letters (Stamped)": 
			price = 1.0; 
			break;
		case "Letters (Metered)": 
			price = 2.0; 
			break;
		case "Large Envelopes (Flats)":
			price = 3.0; 
			break;
		case "First-Class Package Service (Retail)":
			price = 4.0; 
			
			const params = {pounds: pounds, ounces: ounces, type: type, price: price};
			
			response.render('pages/index2', params);
	}
	
}
