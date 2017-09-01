let fs = require('fs');

let IO = {
	write: (obj, fileName) => {
		var objectString = JSON.stringify(obj);

		fs.writeFile(fileName, objectString);
	},
	read: (fileName) => {
		if (!fs.existsSync(fileName)) {
			return [];
		}

		var objectString = fs.readFileSync(fileName);
		var obj = JSON.parse(objectString);

		return obj;
	}
};

module.exports = IO;