var utilities = require('./utilities');

var index = 0;
var num = 2;
var latestPrime = 0;
while (index < 10001) {
	if (utilities.isPrime(num)) {
		latestPrime = num;
		index++;
	}
	
	num++;
}

console.log(latestPrime);