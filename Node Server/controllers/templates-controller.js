let fs = require('fs');
let TemplateParser = require('../utilities/template-parser');

let TemplatesController = {
	test: () => {
		let html = fs.readFileSync('./views/test.html').toString();

		return TemplateParser.parseView({
			'test': 'tstttst',
			'mest': { test: 'testa na mesta', num: 20 },
			'items': ['Pesho', 'Gosho', 'Tosho'],
			'items1': ['Pesho1', 'Gosho1', 'Tosho1'],
			'objectItems': [
				{ name: 'Penka', age: 12 },
				{ name: 'Stela', age: 19 },
				{ name: 'Nikolai', age: 21 }
			]
		}, html);
	}
};

module.exports = TemplatesController;