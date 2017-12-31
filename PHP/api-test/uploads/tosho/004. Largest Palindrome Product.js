function isPalindrome(num) {
	var numStr = num + '';
	for (var i = 0; i < numStr.length; i++) {
		if (numStr[i] != numStr[numStr.length - i - 1]) {
			return false;
		}
	}

	return true;
}

for (var m1 = 1000; m1 >= 900; m1--) {
	for (var m2 = 1000; m2 >= 900; m2--) {
		if (isPalindrome(m1 * m2) && largestPalindrome < m1 * m2) {
			console.log(m1 * m2);
			break;
		}
	}
}