for (var a = 1; a < 998; a++) {
	for (var b = a + 1; b < 999; b++) {
		for (var c = b + 1; c < 1000; c++) {
			if (a + b + c != 1000) {
				continue;
			} else {
				if (a * a + b * b == c * c) {
					console.log(a, b, c);
					console.log(a * b * c);
				}
			}
		}
	}
}