var s = 0;
for(var i = 2; i < process.argv.length; i++) {
	s += Number(process.argv[i]); 
}
console.log(s);

